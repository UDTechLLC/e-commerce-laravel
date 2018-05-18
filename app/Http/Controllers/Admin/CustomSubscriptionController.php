<?php

namespace App\Http\Controllers\Admin;

use App\Responses\CustomSubscriptionResponse;
use App\Http\Controllers\Controller;

class CustomSubscriptionController extends Controller
{
    public function index()
    {
        return view('admin.subscriptions.custom.index');
    }

    public function getSubscriptions()
    {
        return new CustomSubscriptionResponse();
    }
}
