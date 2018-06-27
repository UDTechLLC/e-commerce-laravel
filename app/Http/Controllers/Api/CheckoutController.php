<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\BillingRequest;
use App\Http\Requests\Checkout\ShippingRequest;
use App\Http\Resources\Api\UpSaleResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderShipping;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Transformers\Api\OrderTransformer;
use App\Transformers\Api\ProductTransformer;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

/**
 * Class CheckoutController
 * @package App\Http\Controllers\Api
 */
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

        $shippingCost = 0;

        if (null === $user && null !== $request->get('password')) {
            $validator = $this->validator([
                'email'    => $request->get('email'),
                'password' => $request->get('password'),
                'phone'    => $request->get('phone'),
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            $user = $this->createUser($request);
        }

        if ($cart->isShipping()) {
            $country = $request->get('country')['name'];
            $shippingCost = getShippingCost($country, $cart->isSubscribe());
        }
        // todo: Check shipping

        $billing = $this->createOrUpdateBilling($request, $orderBilling);

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
        $country = $request->get('country')['name'];

        $shipping = $this->createOrUpdateShipping($request, $orderShipping);

        $this->updateOrder($order, $shipping, $country);

        return fractal($order, new OrderTransformer())->respond();
    }

    /**
     * @param Order $order
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getUpSaleProduct(Order $order)
    {
        return UpSaleResource::collection(Product::whereIn('slug', $this->upSaleProductsList($order->cart))->get());
    }

    /**
     * @param Request $request
     * @param Order $order
     */
    public function addUpSaleProduct(Request $request, Order $order)
    {
        foreach ($request->get('products') as $id) {
            Product::findOrFail($id);
            $order->cart->products()->attach($id, ['count' => 1]);
        }

        $oldProducts = $order->products->map(function ($value) {
            return $value->id;
        })->toArray();

        $cart = $order->cart;
        foreach ($cart->products as $product) {
            if (!in_array($product->getKey(), $oldProducts)) {
                $order->products()->attach($product->id, [
                    'count'            => $product->pivot->count,
                    'product_price'    => $product->amount,
                    'subscribe_period' => $product->pivot->subscribe_period,
                ]);
            }
        }

        $cart->fresh();
        $shippingCost = $order->shipping_cost;

        if ($cart->isShipping()) {
            $country = $order->shipping ? $order->shipping->country : $order->billing->country;
            $shippingCost = getShippingCost($country, $cart->isSubscribe());
        }

        $order->update([
            'product_cost'  => $order->cart->getProductsCost(),
            'shipping_cost' => $shippingCost,
            'discount_cost' => $order->cart->getDiscountCost(),
            'total_cost'    => $order->cart->getWithDiscountCost() + $shippingCost,
            'count'         => $order->cart->getProductsCount()
        ]);
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
        $country = $request->get('country')['name'];
        $iso3166 = $request->get('country')['code'];

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
        /** @var Order $order */
        $order = Order::create([
            'user_id'       => null !== $user ? $user->getKey() : null,
            'billing_id'    => $billing->getKey(),
            'cart_id'       => $cart->getKey(),
            'coupon_id'     => $cart->coupon ? $cart->coupon->getKey() : null,
            'product_cost'  => $cart->getProductsCost(),
            'shipping_cost' => $shippingCost,
            'discount_cost' => $cart->getDiscountCost(),
            'total_cost'    => $cart->getWithDiscountCost() + $shippingCost,
            'count'         => $cart->getProductsCount(),
            'state'         => Order::ORDER_STATE_PENDING_PAYMENT,
        ]);

        foreach ($cart->products as $product) {
            $order->products()->attach($product->id, [
                'count'            => $product->pivot->count,
                'product_price'    => $product->amount,
                'subscribe_period' => $product->pivot->subscribe_period,
            ]);
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
            'country'      => $request->get('country')['name'],
            'iso_3166'     => $request->get('country')['code'],
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
        $shippingCost = getShippingCost($country, $order->hasSubscriptionProduct());

        $order->update([
            'shipping_id'   => $shipping->getKey(),
            'shipping_cost' => $shippingCost,
//            'total_cost'    => $order->product_cost + $shippingCost,
            'total_cost'    => $order->total_cost - $order->shipping_cost + $shippingCost,
        ]);
    }

    /**
     * Create user.
     *
     * @param $request
     *
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    private function createUser($request)
    {
        $user = User::create([
            'first_name' => $request->get('firstName'),
            'last_name'  => $request->get('lastName'),
            'email'      => $request->get('email'),
            'phone'      => $request->get('phone'),
            'password'   => bcrypt($request->get('password')),
        ]);
        $user->attachRole(Role::where('name', 'user')->first());

        return $user;
    }

    /**
     * @param Cart $cart
     * @return array
     */
    private function upSaleProductsList(Cart $cart): array
    {
        $userBuys = $cart->products->map(function ($value) {
            return $value->title;
        });


        $upSaleConfig = config('up-sale');

        foreach ($upSaleConfig as $item) {
            if ($this->checkProductInCart($userBuys, collect($item['user_buys']))) {
                if ($this->checkProductInNotCart($userBuys, collect($item['is_not_in_cart']))) {
                    return $item['up_sale_products'];
                }
            }
        }

        return [];
    }

    /**
     * @param $cartProducts
     * @param $checkProduct
     * @return bool
     */
    private function checkProductInCart($cartProducts, $checkProduct): bool
    {
        return $checkProduct->diff($cartProducts)->isEmpty();
    }

    /**
     * @param $cartProducts
     * @param $checkProduct
     * @return bool
     */
    private function checkProductInNotCart($cartProducts, $checkProduct): bool
    {
        return $checkProduct->intersect($cartProducts)->isEmpty();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone'    => 'required|unique:users',
        ]);
    }
}
