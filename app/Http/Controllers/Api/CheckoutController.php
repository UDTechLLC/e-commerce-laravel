<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\BillingRequest;
use App\Http\Requests\Checkout\ShippingRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderShipping;
use App\Models\User;
use App\Transformers\Api\OrderTransformer;
use PragmaRX\Countries\Package\Countries;

class CheckoutController extends Controller
{
    /**
     * Add billing information.
     *
     * @param BillingRequest $request
     *
     * @param Cart $cart
     *
     * @param OrderBilling $orderBilling
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function billing(BillingRequest $request, Cart $cart, OrderBilling $orderBilling)
    {
        /** @var User $user */
        $user = \Auth::user();
        $country = $request->get('country');

        $billing = $this->createOrUpdateBilling($request, $orderBilling);

        $shippingCost = $cart->getShippingSum($country);

        $order = $this->createOrder($user, $cart, $billing, $shippingCost);

        return fractal($order, new OrderTransformer())->respond();
    }

    /**
     * Add shipping information.
     *
     * @param ShippingRequest $request
     *
     * @param Order $order
     *
     * @param OrderShipping $orderShipping
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function shipping(ShippingRequest $request, Order $order, OrderShipping $orderShipping)
    {
        $country = $request->get('country');

        $shipping = $this->createOrUpdateShipping($request, $orderShipping);

        $this->updateOrder($order, $shipping, $country);

        return fractal($order, new OrderTransformer())->respond();
    }

    /**
     * Add billing information.
     *
     * @param $request
     *
     * @param $billing
     *
     * @return mixed
     */
    private function createOrUpdateBilling($request, $billing)
    {
        $billingId = $billing->getKey();
        $country = $request->get('country');

        $iso3166 = $country
            ? $this->getIso3166($country)
            : null;

        return OrderBilling::updateOrCreate(['id' => $billingId], [
            'first_name'   => $request->get('firstName'),
            'last_name'    => $request->get('lastName'),
            'email'        => $request->get('email'),
            'company_name' => $request->get('company'),
            'street'       => $request->get('street'),
            'apartment'    => $request->get('apartment'),
            'country'      => $country,
            'iso_3166'     => $iso3166,
            'city'         => $request->get('city'),
            'state'        => $request->get('state'),
            'postcode'     => $request->get('postcode'),
            'phone'        => $request->get('phone'),
        ]);
    }

    /**
     * Create order.
     *
     * @param $user
     * @param Cart $cart
     * @param $billing
     *
     * @param $shippingCost
     *
     * @return mixed
     */
    private function createOrder($user, Cart $cart, OrderBilling $billing, $shippingCost)
    {
        $productCost = $cart->getProductsSum();
        $count = $cart->getProductsCount();

        /** @var Order $order */
        $order = Order::create([
            'order_key'     => rand(111111111, 999999999),
            'user_id'       => null !== $user ? $user->getKey() : null,
            'billing_id'    => $billing->getKey(),
            'cart_id'       => $cart->getKey(),
            'coupon_id'     => $cart->coupon ? $cart->coupon->getKey() : null,
            'product_cost'  => $productCost,
            'shipping_cost' => $shippingCost,
            'discount_cost' => $cart->getDiscountSum(),
            'total_cost'    => $cart->getWithDiscountSum(),
            'count'         => $count,
            'state'         => Order::ORDER_STATE_PENDING_PAYMENT,
        ]);

        foreach ($cart->products as $product) {
            $order->products()->attach($product->id, ['count' => $product->pivot->count]);
        }

        return $order;
    }

    /**
     * Create shipping.
     *
     * @param $request
     *
     * @param $shipping
     *
     * @return mixed
     */
    private function createOrUpdateShipping($request, $shipping)
    {
        $shippingId = $shipping->getKey();

        return OrderShipping::updateOrCreate(['id' => $shippingId], [
            'first_name'   => $request->get('firstName'),
            'last_name'    => $request->get('lastName'),
            'company_name' => $request->get('company'),
            'street'       => $request->get('street'),
            'apartment'    => $request->get('apartment'),
            'country'      => $request->get('country'),
            'iso_3166'     => $this->getIso3166($request->get('country')),
            'city'         => $request->get('city'),
            'state'        => $request->get('state'),
            'postcode'     => $request->get('postcode'),
        ]);
    }

    /**
     * Update order.
     *
     * @param Order $order
     * @param OrderShipping $shipping
     * @param string $country
     */
    private function updateOrder(Order $order, OrderShipping $shipping, string $country)
    {
        $shippingCost = $order->cart->getShippingSum($country);

        $order->update([
            'shipping_id'   => $shipping->getKey(),
            'shipping_cost' => $shippingCost,
            'total_cost'    => $order->product_cost + $shippingCost,
        ]);
    }

    /**
     * Get iso_3166_1_alpha2 by country name.
     *
     * @param string $name
     *
     * @return mixed
     */
    private function getIso3166(string $name)
    {
        return Countries::where('name.common', $name)->first()->iso_3166_1_alpha2;
    }
}
