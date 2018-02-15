<?php

namespace App\Http\Controllers\Web;

use App\Services\PayPal\PayPalService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayPalController extends Controller
{
    /** @var PayPalService */
    protected $service;

    public function __construct()
    {
        $this->service = new PayPalService();
    }

    public function pay(Request $request)
    {
        $this->setCallbacks();
    }

    public function returnUrl()
    {

    }

    public function cancelUrl()
    {

    }

    private function setCallbacks()
    {

    }
}
