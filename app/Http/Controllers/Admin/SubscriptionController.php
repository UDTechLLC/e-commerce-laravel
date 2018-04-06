<?php

namespace App\Http\Controllers\Admin;

use App\Responses\SubscriptionResponse;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('admin.subscriptions.index');
    }
    
    public function getSubscriptions()
    {
        return new SubscriptionResponse();
    }
}
