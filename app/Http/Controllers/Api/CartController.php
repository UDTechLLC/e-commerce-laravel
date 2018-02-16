<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\CartNotFoundException;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\CartProductResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        /** @var User $user */
        $user = \Auth::user();
        $hash = $request->get('hash');

        $cart = null === $user
            ? Cart::where('hash', $hash)->first()
            : $user->cart();

        throw_if(null === $cart, new CartNotFoundException());

        return CartProductResource::collection($cart->products);
    }

    /**
     * @param StoreCartRequest $request
     * @param Product $product
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Throwable
     */
    public function store(StoreCartRequest $request, Product $product)
    {
        /** @var User $user */
        $user = \Auth::user();
        $hash = $request->get('hash');

        /** @var Cart $cart */
        $cart = null === $user
            ? Cart::where('hash', $hash)->first() ?? Cart::create(['hash' => $hash])
            : $cart = $user->cart();

        throw_if(null === $cart, new CartNotFoundException());

        $cart->products()->save($product);

        return CartProductResource::collection($cart->products);
    }

    /**
     * @param Request $request
     *
     * @param Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function removeAll(Request $request, Product $product)
    {
        /** @var User $user */
        $user = \Auth::user();
        $hash = $request->get('hash');

        /** @var Cart $cart */
        $cart = null === $user
            ? $cart = Cart::where('hash', $hash)->first()
            : $cart = $user->cart();

        throw_if(null === $cart, new CartNotFoundException());

        $cart->products()->detach($product);

        return response()->json();
    }
}
