<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\CartNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Resources\Api\CartResource;
use App\Models\Cart;
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
        /** @var User $user */
        $user = \Auth::user();
        $hash = $request->get('hash');

        $cart = $this->getCart($user, $hash);

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

        return $this->delete($product, $hash);
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

        return $this->delete($product, $hash, true);
    }

    /**
     * @param Product $product
     * @param $hash
     *
     * @param bool $all
     *
     * @return CartResource
     * @throws \Throwable
     */
    private function delete($product, $hash, $all = false)
    {
        /** @var User $user */
        $user = \Auth::user();

        /** @var Cart $cart */
        $cart = $this->getCart($user, $hash);

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
     * @param $hash
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    private function getCart($user, $hash)
    {
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
}
