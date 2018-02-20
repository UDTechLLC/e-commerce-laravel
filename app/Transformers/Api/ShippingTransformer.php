<?php

namespace App\Transformers\Api;

use App\Models\Shipping;
use League\Fractal\TransformerAbstract;

class ShippingTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Shipping $shipping
     *
     * @return array
     */
    public function transform(Shipping $shipping)
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
