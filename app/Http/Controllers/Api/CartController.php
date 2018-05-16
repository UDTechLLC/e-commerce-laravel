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

        $this->calculateDiscount($cart);

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
        $coupon = Coupon::where('code', $code)->where('active', true)->first();

        if (null === $coupon) {
            return response()->json(['Coupon not found'], 404);
        }

        $coupon->carts()->save($cart);

        $this->calculateDiscount($cart);

        return fractal($cart, new CartTransformer())->respond();
    }

    /**
     * @param RemoveCouponRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeCoupon(RemoveCouponRequest $request)
    {
        /** @var Cart $cart */
        $cart = $this->getCart($request);

        $cart->coupon()->dissociate()->save();

        $this->calculateDiscount($cart);

        return fractal($cart, new CartTransformer())->respond();
    }

    /**
     * @param $request
     * @param Product $product
     * @param bool $all
     *
     * @return CartResource
     * @throws \Throwable
     */
    private function delete($request, $product, $all = false)
    {
        /** @var Cart $cart */
        $cart = $this->getCart($request);

        throw_if(null === $cart, new CartNotFoundException());

        $countProduct = $cart->products()->where('product_id', $product->getKey())->first()->pivot->count;

        if ($all || 1 === $countProduct) {
            $cart->products()->detach($product);
            if ($product->bandls != null) {
                $cart->products()->detach($product->bandls);
            }
        } else {
            $cart->products()->updateExistingPivot($product->getKey(), ['count' => --$countProduct]);
        }

        if ($cart->getProductsCount() === 0) {
            $cart->coupon()->dissociate()->save();
        }

        $this->calculateDiscount($cart);

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
            : $user->cart;
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
        $couponProducts = $coupon->products ?? null;

        $discount = $coupon->coupon_amount ?? null;

        foreach ($cartProducts as $cartProduct) {
            if (null === $couponProducts) {
                $cartProduct->pivot->discount = 0;
                $cartProduct->pivot->discount_sum = 0;

                $cartProduct->pivot->save();

                continue;
            }

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
