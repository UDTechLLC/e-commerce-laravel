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
    /**
     * @param Request $request
     * @param Order $order
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function pay(Request $request, Order $order)
    {
        $token = $request->get('nonce');

        $amount = $order->total_cost;

        if ($order->isShipping()) {
            $this->sendOrderToShipStation($order);
        }

        /** @var User $user */
        $user = \Auth::user() ?? $order->user;

        if ($user && $order->hasSubscriptionProduct()) {
            $subscriptionProduct = $order->getSubscriptionProduct();

            $plan = $subscriptionProduct
                ? $subscriptionProduct->plan
                : null;

            if (null !== $plan) {
                try {
                    $result = $user->newSubscription($plan->name, $plan->braintree_plan)->create($token);
                } catch (\Exception $ex) {
                    return view('errors.error_payment', [
                        'message' => $ex->getMessage(),
                    ]);
                }

                $amount -= $subscriptionProduct->amount;
            } else {
                return response()->json(['error' => 'No plan found for this product'], 404);
            }

            if (0 !== $amount) {
                $result = $user->charge($amount, ['orderId' => $order->order_id]);
            }
        } else {
            $service = new BraintreeService();

            $service->setAuthToken($token);

            $result = $service->pay($amount, ['orderId' => $order->order_id]);
        }

        if ($result->success) {
            $this->clearing($result, $order);

            return view('web.checkout.checkout_thank_you', ['order' => $order]);
        } else {
            return view('errors.error_payment', [
                'message' => $result->message,
            ]);
        }
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
            'state' => Order::ORDER_STATE_PROCESSING,
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
     * Get braintree token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBraintreeToken()
    {
        return response()->json(['token' => (new BraintreeService())->getToken()]);
    }

    /**
     * @param $result
     * @param Order $order
     */
    private function clearing($result, $order)
    {
        $order->cart->clear();

        $this->updateOrderStatus($order);
        $this->setOrderPaymentMethod($order, $result->transaction->paymentInstrumentType);

        if ($order->isShipping()) {
            $this->updateOrderStatusOnShipStation($order);
        }

        $this->sendOrderToEmail($order);
    }

    /**
     * @param Order $order
     * @param string $paymentMethod
     */
    private function setOrderPaymentMethod(Order $order, string $paymentMethod)
    {
        $order->update(['payment_method' => $paymentMethod]);
    }
}
