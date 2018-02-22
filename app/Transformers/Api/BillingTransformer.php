<?php

namespace App\Transformers\Api;

use App\Models\OrderBilling;
use League\Fractal\TransformerAbstract;

class BillingTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param OrderBilling $billing
     *
     * @return array
     */
    public function transform(OrderBilling $billing)
    {
        return [
            'first_name'    => $billing->first_name,
            'last_name'     => $billing->last_name,
            'company'       => $billing->company_name,
            'email'         => $billing->email,
            'street'        => $billing->street,
            'apartment'     => $billing->apartment,
            'country'       => $billing->country,
            'city'          => $billing->city,
            'state'         => $billing->state,
            'postcode'      => $billing->postcode,
            'phone'         => $billing->phone,
        ];
    }
}
