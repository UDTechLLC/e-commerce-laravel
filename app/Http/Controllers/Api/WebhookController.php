<?php

namespace App\Http\Controllers\Api;

use App\Mail\OrderSent;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\User;
use App\Services\Orders\ShipStationService;
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
     *
     * @throws \Exception
     */
    public function handleSubscriptionWentActive(Request $request)
    {
        \Log::info('Start subscribe');

        $notification = $this->parseBraintreeNotification($request);

        \Log::info('Subscription info: ', [
            'id'    => $notification->subscription->id,
            'cycle' => $notification->subscription->currentBillingCycle,
        ]);
    }

    /**
     * @param Request $request
     *
     * @throws \Exception
     */
    public function handleSubscriptionChargedSuccessfully(Request $request)
    {
        \Log::info('Start new billing cycle');

        $notification = $this->parseBraintreeNotification($request);

        \Log::info('Subscription info: ', [
            'id'    => $notification->subscription->id,
            'cycle' => $notification->subscription->currentBillingCycle,
        ]);

        if ($notification->subscription->currentBillingCycle > 1) {
            \Log::info('Start prepare new order');

            $order = Order::where(
                'subscription_id',
                Subscription::where('braintree_id', $notification->subscription->id)->first()->getKey()
            )
                ->first();

            \Log::info('Order was found');
            $newOrder = $this->createOrder($order);

            \Log::info('New order was created');

            $user = User::where('braintree_id', $notification->subscription->transactions[0]->customer['id'])->first();
            $user->charge($newOrder->shipping_cost);

            \Log::info('User was found');

            $this->sendOrderToShipStation($newOrder);
            $this->sendOrderToEmail($newOrder);

            \Log::info('New order was prepared');
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
        $product = $order->getSubscriptionProduct();

        $newOrder = Order::create([
            'user_id'        => $order->user->getKey(),
            'billing_id'     => $order->billing_id,
            'shipping_id'    => $order->shipping_id,
            'cart_id'        => $order->cart->getKey(),
            'coupon_id'      => null,
            'payment_method' => $order->payment_method,
            'product_cost'   => $product->amount,
            'shipping_cost'  => $order->shipping_cost,
            'discount_cost'  => 0,
            'total_cost'     => $product->amount + $order->shipping_cost,
            'count'          => 1,
            'state'          => Order::ORDER_STATE_PROCESSING,
        ]);

        $newOrder->products()->attach($product->id, [
            'count'         => $newOrder->count,
            'product_price' => $product->pivot->product_price,
        ]);

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
