<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\CartNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddCouponRequest;
use App\Http\Requests\Cart\RemoveCouponRequest;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Resources\Api\CartResource;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use App\Transformers\Api\CartTransformer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @param Request $request
     *
     * @return CartResource
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $cart = $this->getCart($request);

        throw_if(null === $cart, new CartNotFoundException());

        return fractal($cart, new CartTransformer())->respond();
    }

    /**
     * @param StoreCartRequest $request
     * @param Product $product
     *
     * @return CartResource
     * @throws \Throwable
     */
    public function store(StoreCartRequest $request, Product $product)
    {
        /** @var User $user */
        $user = \Auth::user();
        $hash = $request->get('hash');

        /** @var Cart $cart */
        $cart = null === $user
            ? Cart::where('hash', $hash)->first() ?? $this->createCart($hash)
            : $cart = $user->cart();

        throw_if(null === $cart, new CartNotFoundException());

        $isProduct = $cart->products()->where('product_id', $product->getKey())->first();

        $countProduct = $isProduct
            ? $isProduct->pivot->count
            : 0;

        if (0 === $countProduct) {
            $cart->products()->attach($product, ['count' => ++$countProduct]);
        } else {
            $cart->products()->updateExistingPivot($product->getKey(), ['count' => ++$countProduct]);
        }

        return fractal($cart, new CartTransformer())->respond();
    }

    /**
     * @param Request $request
     *
     * @param Product $product
     *
     * @return CartResource
     * @throws \Throwable
     */
    public function remove(Request $request, Product $product)
    {
        $hash = $request->get('hash');

        return $this->delete($request, $product);
    }

    /**
     * @param Request $request
     *
     * @param Product $product
     *
     * @return CartResource
     * @throws \Throwable
     */
    public function removeAll(Request $request, Product $product)
    {
        $hash = $request->get('hash');

        return $this->delete($request, $product, true);
    }

    /**
     * @param AddCouponRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCoupon(AddCouponRequest $request)
    {
        $code = $request->get('code');

        /** @var Cart $cart */
        $cart = $this->getCart($request);

        /** @var Coupon $coupon */
        $coupon = Coupon::where('code', $code)->first();

        $coupon->carts()->save($cart);

        $this->calculateDiscount($cart);

        return fractal($cart, new CartTransformer())->respond();
    }

//    public function removeCoupon(RemoveCouponRequest $request)
//    {
//        $code = $request->get('code');
//
//        /** @var Cart $cart */
//        $cart = $this->getCart($request);
//
//        /** @var Coupon $coupon */
//        $coupon = Coupon::where('code', $code)->first();
//    }

    /**
     * @param $requrst
     * @param Product $product
     * @param bool $all
     *
     * @return CartResource
     * @throws \Throwable
     */
    private function delete($requrst, $product, $all = false)
    {
        /** @var Cart $cart */
        $cart = $this->getCart($requrst);

        throw_if(null === $cart, new CartNotFoundException());

        $countProduct = $cart->products()->where('product_id', $product->getKey())->first()->pivot->count;

        if ($all || 1 === $countProduct) {
            $cart->products()->detach($product);
        } else {
            $cart->products()->updateExistingPivot($product->getKey(), ['count' => --$countProduct]);
        }

        return fractal($cart, new CartTransformer())->respond();
    }

    /**
     * @param $request
     *
     * @return Cart
     */
    private function getCart($request)
    {
        $user = \Auth::user();

        $hash = $request->get('hash');

        return null === $user
            ? Cart::where('hash', $hash)->first() ?? $this->createCart($hash)
            : $user->cart();
    }

    /**
     * Create cart.
     *
     * @param $hash
     *
     * @return Cart
     */
    private function createCart($hash)
    {
        return Cart::create([
            'hash' => $hash
        ]);
    }

    /**
     * @param $cart
     */
    private function calculateDiscount($cart)
    {
        $coupon = $cart->coupon;

        $cartProducts = $cart->products;
        $couponProducts = $coupon->products;

        $discount = $coupon->coupon_amount;

        foreach ($cartProducts as $cartProduct) {
            foreach ($couponProducts as $couponProduct) {
                if ($cartProduct->getKey() !== $couponProduct->getKey()) {
                    continue;
                }

                $cartProduct->pivot->discount =
                    $cartProduct->amount / 100 * $discount;

                $cartProduct->pivot->discount_sum =
                    $cartProduct->amount * $cartProduct->pivot->count / 100 * $discount;
                $cartProduct->pivot->save();
            }
        }
    }
}
