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
        $productsSum = $cart->getProductsCost();
        $discountSum = $cart->getDiscountCost();
        $withDiscountSum = $cart->getWithDiscountCost();
        $productCount = $cart->getProductsCount();
        $isShipping = $cart->isShipping();
        $isSubscribe = $cart->isSubscribe();
        $subscribeInfo = $cart->subscribeInfo();

        return [
            'id'          => $cart->getKey(),
            'products'    => fractal($cart->products, new ProductTransformer()),
            'isShipping'  => $isShipping,
            'isSubscribe' => $isSubscribe,
            'coupon'      => $cart->coupon ? $cart->coupon->code : null,
            'sum'         => [
                'products_counts'   => $productCount,
                'products_sum'      => $productsSum,
                'discount_sum'      => $discountSum,
                'with_discount_sum' => $withDiscountSum,
            ],
            'subscribeInfo' => $subscribeInfo
        ];
    }
}
