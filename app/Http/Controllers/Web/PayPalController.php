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
        $this->setCallbacks();  //todo: add order id to callback
        $this->service->setAmount(20);

        $response = $this->service->purchase();

        return $response->redirect();
    }

    public function returnUrl()    //todo: add order
    {
        $this->setCallbacks();
        $this->service->setAmount(20);    //todo: get from order

        $response = $this->service->completePurchase();

        return $response->redirect();
    }

    public function cancelUrl()
    {

    }

    private function setCallbacks()
    {
        $this->service->setReturnUrl(route('paypal.return'));
        $this->service->setCancelUrl(route('paypal.cancel'));
    }
}
