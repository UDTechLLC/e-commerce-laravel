<?php

namespace App\Http\Controllers\Api;

use App\Mail\OrderSent;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\User;
use App\Services\Orders\ShipStationService;
use Braintree\WebhookNotification;
use Illuminate\Http\Request;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

/**
 * Class WebhookController.
 * @package App\Http\Controllers\Api
 */
class WebhookController extends CashierController
{
    /**
     * @param Request $request
     */
    public function handleSubscriptionChargedSuccessfully(Request $request)
    {
        $notification = $this->parseBraintreeNotification($request);
    }

    /**
     * @param Request $request
     */
    public function handleSubscriptionWentActive(Request $request)
    {
        $notification = $this->parseBraintreeNotification($request);

        if ($notification->subscription->currentBillingCycle > 1) {
            $order = Order::where('subscription_id', $notification->subscription->id)->first();

            $newOrder = $this->createOrder($order);

            $this->sendOrderToShipStation($newOrder);
            $this->sendOrderToEmail($newOrder);
        }
    }

    /**
     * @param Request $request
     */
    public function handleSubscriptionCustomCanceled(Request $request)
    {
        $webhook = $this->parseBraintreeNotification($request);

        parent::handleSubscriptionCanceled($webhook);

        $this->updateSubscriptionStatus($webhook->subscription->id, Subscription::SUBSCRIPTION_CANCELED);
    }

    /**
     * @param Request $request
     */
    public function handleSubscriptionCustomExpired(Request $request)
    {
        $webhook = $this->parseBraintreeNotification($request);

        parent::handleSubscriptionExpired($webhook);

        $this->updateSubscriptionStatus($webhook->subscription->id, Subscription::SUBSCRIPTION_EXPIRED);
    }

    /**
     * @param Request $request
     */
    public function handleSubscriptionPastDue(Request $request)
    {
        $webhook = $this->parseBraintreeNotification($request);

        $this->updateSubscriptionStatus($webhook->subscription->id, Subscription::SUBSCRIPTION_PAST_DUE);
    }

    /**
     * @param Request $request
     */
    public function handleSubscriptionPending(Request $request)
    {
        $webhook = $this->parseBraintreeNotification($request);

        $this->updateSubscriptionStatus($webhook->subscription->id, Subscription::SUBSCRIPTION_PENDING);
    }

    /**
     * Create new order.
     *
     * @param Order $order
     *
     * @return mixed
     */
    private function createOrder(Order $order)
    {
        $product = $order->products()->whereNotNull('plan_id')->first();

        $newOrder = Order::create([
            'user_id'        => $order->user->getKey(),
            'billing_id'     => $order->billing_id,
            'shipping_id'    => $order->shipping_id,
            'cart_id'        => $order->cart->getKey(),
            'coupon_id'      => null,
            'payment_method' => $order->payment_method,
            'product_cost'   => $order->product_cost,
            'shipping_cost'  => $order->shipping_cost,
            'discount_cost'  => $order->discount_cost,
            'total_cost'     => $product->amount + $order->shipping_cost,
            'count'          => 1,
            'state'          => Order::ORDER_STATE_PROCESSING,
        ]);

        $newOrder->products()->attach($product->id, ['count' => $product->pivot->count]);

        return $newOrder;
    }

    /**
     * Send order to shipstation.
     *
     * @param Order $order
     */
    private function sendOrderToShipStation(Order $order)
    {
        $service = new ShipStationService($order);
        $service->create();
    }

    /**
     * Send order to email.
     *
     * @param Order $order
     */
    private function sendOrderToEmail(Order $order)
    {
        \Mail::to($order->billing->email)->send(new OrderSent($order));
    }

    /**
     * Update subscription status.
     *
     * @param $braintreeId
     * @param $status
     */
    private function updateSubscriptionStatus($braintreeId, $status)
    {
        Subscription::where('braintree_id', $braintreeId)
            ->first()
            ->update(['status' => $status]);
    }
}
