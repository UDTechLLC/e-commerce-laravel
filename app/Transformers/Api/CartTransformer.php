<?php

namespace App\Transformers\Api;

use App\Models\Cart;
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
    public function transform(Cart $cart)
    {
        return [
            'id'       => $cart->getKey(),
            'products' => fractal($cart->products, new ProductTransformer()),
            'isShipping' => $this->isShipping($cart),
            'sum'      => [
                'products_counts' => $this->getProductsCount($cart),
                'products_sum' => $this->getProductsSum($cart),
                'shipping_sum' => $this->getShippingSum(),
                'total_sum' => $this->getProductsSum($cart) + $this->getShippingSum(),
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

    private function getShippingSum()
    {
        $country = $this->getDefaultCountry();

        return $country === 'United States' || $country === 'Canada'
            ? 17.99
            : 6.99;
    }

    /**
     * Get country by ip.
     *
     * @return mixed
     */
    private function getDefaultCountry()
    {
        $http = new Client();

        $response = $this->decodeResponse($http->get("http://ip-api.com/json/{$_SERVER['REMOTE_ADDR']}"));

        return isset($response->country) ?: 'United States';
    }

    /**
     * Decode response.
     *
     * @param $response
     *
     * @return mixed
     */
    private function decodeResponse($response)
    {
        return json_decode((string)$response->getBody());
    }

    private function isShipping(Cart $cart)
    {
        foreach ($cart->products as $product) {
            if ($product->isVirtual) {
                return true;
            }
        }

        return false;
    }
}
