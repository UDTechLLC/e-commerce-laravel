<?php

namespace App\Http\Controllers\Api;

use App\Mail\OrderSent;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\Braintree\BraintreeService;
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

        $order->cart->clear();

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

    /**
     * @param Request $request
     * @param Order $order
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function payBraintree(Request $request, Order $order)
    {
        $token = $request->get('nonce');

        $amount = $order->total_cost;

        if ($order->isShipping()) {
            $this->sendOrderToShipStation($order);
        }

        /** @var User $user */
        $user = \Auth::user() ?? $order->user;

        if ($user) {
            $subscriptionProduct = $order->getSubscriptionProduct();
            $plan = $subscriptionProduct
                ? $subscriptionProduct->plan
                : null;

            if (null !== $plan) {
                $result = $user->newSubscription($plan->name, $plan->braintree_plan)->create($token);

                if ($result->success) {
                    $amount -= $subscriptionProduct->amount;
                } else {
                    return response()->json(['error' => 'Error payment']);
                }
            } else {
                return response()->json(['error' => 'No plan found for this product'], 404);
            }

            if (0 !== $amount) {
                $result = $user->charge($amount);
            }

            if ($result->success) {
                $this->clearing($order);

                return view('web.checkout.checkout_thank_you', ['order' => $order]);
            } else {
                return response()->json(['error' => 'Error payment']);
            }
        }

        $service = new BraintreeService();

        $service->setAuthToken($token);

        $result = $service->pay($amount);

        if ($result->success) {
            $this->clearing($order);

            return view('web.checkout.checkout_thank_you', ['order' => $order]);
        } else {
            return response()->json(['error' => 'Error payment']);
        }
    }

    /**
     * Get braintree token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBraintreeToken()
    {
        return response()->json(['token' => (new BraintreeService())->getToken()]);
    }

    /**
     * @param $order
     */
    private function clearing($order)
    {
        $order->cart->clear();

        $this->updateOrderStatus($order);

        if ($order->isShipping()) {
            $this->updateOrderStatusOnShipStation($order);
        }

        $this->sendOrderToEmail($order);
    }
}
