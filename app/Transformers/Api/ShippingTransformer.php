<?php

namespace App\Transformers\Api;

use App\Models\OrderShipping;
use League\Fractal\TransformerAbstract;

class ShippingTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param OrderShipping $shipping
     *
     * @return array
     */
    public function transform(OrderShipping $shipping)
    {
        return [
            'id'         => $shipping->getKey(),
            'first_name' => $shipping->first_name,
            'last_name'  => $shipping->last_name,
            'company'    => $shipping->company_name,
            'address'    => $shipping->address,
            'apartment'  => $shipping->apartment,
            'country'    => $shipping->country,
            'city'       => $shipping->city,
            'state'      => $shipping->state,
        ];
    }
}
