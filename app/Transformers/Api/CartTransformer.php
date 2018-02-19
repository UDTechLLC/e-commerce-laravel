<?php

namespace App\Transformers\Api;

use App\Models\Cart;
use League\Fractal\TransformerAbstract;

class CartTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Cart $cart
     *
     * @return array
     */
    public function transform(Cart $cart)
    {
        return [
            'id' => $cart->getKey(),
            'products' => fractal($cart->products, new ProductTransformer()),
        ];
    }
}
