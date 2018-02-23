<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Services\PayPal\PayPalService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    /** @var PayPalService */
    protected $service;

    public function __construct()
    {
        $this->service = new PayPalService();
    }

    /**
     * Pay order.
     *
     * @param Request $request
     *
     * @param Order $order
     *
     * @return mixed
     */
    public function pay(Request $request, Order $order)
    {
        $this->setCallbacks($order);
        $this->service->setAmount($order->total_cost);
        $response = $this->service->purchase();

        if (!$response->isRedirect()) {
            return route('/');  //todo: Add error
        }

        return $response->redirect();
    }

    /**
     * Success pay callback function.
     *
     * @param Request $request
     * @param Order $order
     *
     * @return mixed
     */
    public function returnUrl(Request $request, Order $order)
    {
        $this->setCallbacks($order);
        $this->service->setAmount($order->total_cost);

        $response = $this->service->completePurchase();

        return view('checkout_thank_you');
    }

    /**
     * Cancel pay callback function.
     */
    public function cancelUrl()
    {
    }

    /**
     * Set callbacks for paypal answer.
     *
     * @param $order
     */
    private function setCallbacks($order)
    {
        $this->service->setReturnUrl(route('.pay.success', ['order' => $order->getKey()]));
        $this->service->setCancelUrl(route('paypal.cancel', ['order' => $order->getKey()]));
    }
}
