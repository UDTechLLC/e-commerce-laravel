<?php

namespace App\Http\Controllers\Api;

use App\Mail\OrderSent;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Services\Orders\ShipStationService;
use App\Services\PayPal\PayPalService;
use Braintree\Gateway;
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
        if ($order->isShipping()) {
            $this->sendOrderToShipStation($order);
        }

        $this->setCallbacks($order);
        $this->service->setAmount($order->total_cost);
        $response = $this->service->purchase();

        if (!$response->isRedirect()) {
            return route('/');  //todo: Add error
        }

        $this->clearCart($order->cart);

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

        if ($response->isSuccessful()) {
            $this->updateOrderStatus($order);

            if ($order->isShipping()) {
                $this->updateOrderStatusOnShipStation($order);
            }

            $this->sendOrderToEmail($order);

            return view('web.checkout.checkout_thank_you', ['order' => $order]);
        }
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

    /**
     * Send products.
     *
     * @param Order $order
     */
    private function sendOrderToEmail(Order $order)
    {
        \Mail::to($order->billing->email)->send(new OrderSent($order));
    }

    /**
     * @param Cart $cart
     */
    private function clearCart(Cart $cart)
    {
        $cart->products()->detach();
    }

    /**
     * Update order status.
     *
     * @param Order $order
     */
    private function updateOrderStatus(Order $order)
    {
        $order->update([
            'state' => Order::ORDER_STATE_PROCESSING
        ]);
    }

    /**
     * @param Order $order
     */
    private function sendOrderToShipStation($order)
    {
        $service = new ShipStationService($order);

        $service->create();
    }

    /**
     * @param $order
     */
    private function updateOrderStatusOnShipStation($order)
    {
        $service = new ShipStationService($order);

        $service->update();
    }

    public function payBraintree(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'fqgkkgjbh2z5tjdj',
            'publicKey' => '97t2sjk9hk8smkf8',
            'privateKey' => '18659380deb1ced28908b9059e755ba0'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $request->get('nonce'),
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        dd($result);
    }
}
