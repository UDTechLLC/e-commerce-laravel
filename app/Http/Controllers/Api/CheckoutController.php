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
use App\Services\PayPal\PayPalService;
use App\Transformers\Api\OrderTransformer;
use App\Transformers\Api\UserTransformer;
use Illuminate\Http\Request;

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

        $shippingCost = $this->getShippingSum($cart, $country);

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

        return OrderBilling::updateOrCreate(['id' => $billingId], [
            'first_name'   => $request->get('firstName'),
            'last_name'    => $request->get('lastName'),
            'email'        => $request->get('email'),
            'company_name' => $request->get('company'),
            'street'       => $request->get('street'),
            'apartment'    => $request->get('apartment'),
            'country'      => $request->get('country'),
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
        $productCost = $this->getProductsCost($cart);
        $count = $this->getProductsCount($cart);

        /** @var Order $order */
        $order = Order::create([
            'order_key'     => rand(111111111, 999999999),
            'user_id'       => null !== $user ? $user->getKey() : null,
            'billing_id'    => $billing->getKey(),
            'cart_id'       => $cart->getKey(),
            'product_cost'  => $productCost,
            'shipping_cost' => $shippingCost,
            'total_cost'    => $productCost + $shippingCost,
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
            'city'         => $request->get('city'),
            'state'        => $request->get('state'),
            'postcode'     => $request->get('postcode'),
        ]);
    }

    /**
     * Update order.
     *
     * @param $order
     * @param $shipping
     * @param $country
     */
    private function updateOrder($order, $shipping, $country)
    {
        $shippingCost = $this->getShippingSum($country);

        $order->update([
            'shipping_id'   => $shipping->getKey(),
            'shipping_cost' => $shippingCost,
            'total_cost'    => $order->product_cost + $shippingCost,
        ]);
    }

    /**
     * Get product count in cart.
     *
     * @param Cart $cart
     *
     * @return int
     */
    private function getProductsCount(Cart $cart): int
    {
        $count = 0;

        foreach ($cart->products as $product) {
            $count += $product->pivot->count;
        }

        return $count;
    }

    /**
     * @param Cart $cart
     *
     * @return string
     */
    private function getProductsCost(Cart $cart): string
    {
        $sum = 0;

        foreach ($cart->products as $product) {
            $sum += $product->pivot->count * $product->amount;
        }

        return number_format($sum, 2);
    }

    /**
     * Get shipping sum by country.
     *
     * @param null $country
     *
     * @return float
     */
    private function getShippingSum($cart, $country)
    {
        return $this->isShipping($cart)
            ? $country === 'United States' || $country === 'Canada'
                ? 6.99
                : 17.99
            : 0;
    }

    /**
     * Check shipping.
     *
     * @param Cart $cart
     *
     * @return bool
     */
    private function isShipping(Cart $cart): bool
    {
        /** @var Product $product */
        foreach ($cart->products as $product) {
            if (!$product->isVirtual()) {
                return true;
            }
        }

        return false;
    }
}
