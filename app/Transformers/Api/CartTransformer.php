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
        $a = '';

        return [
            'id'       => $cart->getKey(),
            'products' => fractal($cart->products, new ProductTransformer()),
            'sum'      => [
                'products_counts' => $this->getProductsCount($cart),
                'products_sum' => $this->getProductsSum($cart),
                'shipping_sum' => 10,
                'total_sum' => $this->getProductsSum($cart) + 10,
            ],
        ];
    }

    /**
     * @param Cart $cart
     *
     * @return float
     */
    private function getProductsSum(Cart $cart): float
    {
        $sum = 0;

        foreach ($cart->products as $product) {
            $sum += $product->pivot->count * $product->amount;
        }

        return (float)$sum;
    }

    private function getProductsCount(Cart $cart)
    {
        $count = 0;

        foreach ($cart->products as $product) {
            $count += $product->pivot->count;
        }

        return $count;
    }
}
