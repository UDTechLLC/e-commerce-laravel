<?php

namespace App\Http\Controllers\Api\Auth;

use App\Transformers\Api\UserTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Controllers\Auth\LoginController as Login;

class LoginController extends Login
{
    protected function authenticated(Request $request, $user)
    {
       return fractal($user, new UserTransformer())->respond();
    }
}
