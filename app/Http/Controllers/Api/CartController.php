<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\CartProductResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user = \Auth::user();

        if (!$user) {
            $hash = $request->get('hash');

            $cart = Cart::where('hash', $hash)->first();

            return CartProductResource::collection($cart->products);
        } else {
            $cart = $user->cart();

            return CartProductResource::collection($cart->products);
        }
    }

    public function store(StoreCartRequest $request)
    {
        $user = \Auth::user();

        if (!$user) {
            $hash = $request->get('hash');

            $cart = Cart::where('hash', $hash)->first() ?? Cart::create(['hash' => $hash]);
        } else {
            $cart = $user->cart();
        }

        $product = Product::find($request->get('product_id'));

        $cart->products()->save($product);

        return CartProductResource::collection($cart->products);
    }
}
