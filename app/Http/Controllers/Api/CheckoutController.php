<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\BillingRequest;
use App\Http\Requests\Checkout\ShippingRequest;
use App\Models\Shipping;
use App\Models\User;
use App\Transformers\Api\UserTransformer;

class CheckoutController extends Controller
{
    public function billing(BillingRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt(str_random());

        $user = User::create($data);

        return fractal($user, new UserTransformer())->respond();
    }

    public function shipping(ShippingRequest $request)
    {
        Shipping::create($request->all());

        return fractal(User::find($request->get('user_id')), new UserTransformer())->respond();
    }
}
