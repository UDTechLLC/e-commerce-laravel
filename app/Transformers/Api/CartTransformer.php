<?php

namespace App\Transformers\Api;

use App\Models\Cart;
use App\Models\Product;
use GuzzleHttp\Client;
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
    public function transform(Cart $cart): array
    {
        $productSum = $this->getProductsSum($cart);
        $discountSum = $this->getDiscountSum($cart);
        $productCount = $this->getProductsCount($cart);
        $isShipping = $this->isShipping($cart);

        return [
            'id'         => $cart->getKey(),
            'products'   => fractal($cart->products, new ProductTransformer()),
            'isShipping' => $isShipping,
            'sum'        => [
                'products_counts' => $productCount,
                'products_sum'    => $productSum,
                'discount_sum'    => $discountSum,
            ],
        ];
    }

    /**
     * @param Cart $cart
     *
     * @return string
     */
    private function getProductsSum(Cart $cart): string
    {
        $sum = 0;

        foreach ($cart->products as $product) {
            $sum += $product->pivot->count * $product->amount - $product->pivot->discount;
        }

        return number_format($sum, 2);
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

    private function getDiscountSum(Cart $cart)
    {
        return $cart->products()->withPivot('discount')->sum('discount');
    }
}
