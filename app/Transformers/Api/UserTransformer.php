<?php

namespace App\Transformers\Api;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'         => $user->getKey(),
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name,
            'email'      => $user->email,
//            'company'    => $user->company_name,
//            'address'    => $user->address,
//            'apartment'  => $user->apartment,
//            'country'    => $user->country,
//            'city'       => $user->city,
//            'state'      => $user->state,
//            'postcode'   => $user->postcode,
            'phone'      => $user->phone,
//            'shipping'   => fractal($user->shipping, new ShippingTransformer()),
        ];
    }
}
