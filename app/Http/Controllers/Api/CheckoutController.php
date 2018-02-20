<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\BillingRequest;
use App\Models\User;
use App\Transformers\Api\UserTransformer;

class CheckoutController extends Controller
{
    public function billing(BillingRequest $request)
    {
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'email'      => $request->get('email'),
            'address'    => $request->get('address'),
            'country'    => $request->get('country'),
            'city'       => $request->get('city'),
            'state'      => $request->get('state'),
            'postcode'   => $request->get('postcode'),
            'phone'      => $request->get('phone'),
            'password'   => bcrypt(str_random())
        ]);

        return fractal($user, new UserTransformer())->respond();
    }
}
