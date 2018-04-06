<?php

namespace App\Http\Controllers\Admin;

use App\Responses\SubscriptionResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        return new SubscriptionResponse();
    }
}
