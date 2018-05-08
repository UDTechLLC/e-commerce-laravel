<?php

namespace App\Console\Commands;

use App\Mail\OrderSent;
use App\Models\CustomSubscription;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Product;
use App\Models\User;
use App\Services\Orders\ShipStationService;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CreateNextSubscriptionBillingCycle
 * @package App\Console\Commands
 */
class CreateNextSubscriptionBillingCycle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'braintree:transact';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'New transaction for custom subscription';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /** @var Collection $subscriptions */
        $subscriptions = CustomSubscription::whereDate('next_billing_at', '<', now())
            ->where('status', 'Active')
            ->get();

        if ($subscriptions->isNotEmpty()) {
            $this->recur($subscriptions);
        }

        \Log::info('Subscriptions');
    }

    /**
     * @param $subscriptions
     */
    private function recur($subscriptions)
    {
        $subscriptions->each(function ($item) {
            /** @var Order $order */
            $order = $item->order;
            /** @var Product $product */
            $product = $order->getSubscriptionProduct();
            /** @var Plan $plan */
            $plan = $product->plan;

            if ($this->charge($item->user, $plan->cost, $order->order_id)) {
                $newOrder = $this->createOrder($order);

                $this->sendOrderToShipStation($newOrder);
                $this->sendOrderToEmail($newOrder);

                $item->update(['next_billing_at' => now()->addDays($item->period)]);
            } else {
                $item->update(['status' => 'Inactive']);
            }
        });
    }

    /**
     * @param User $user
     * @param $cost
     *
     * @param $orderId
     *
     * @return boolean
     * @throws \Exception
     */
    private function charge(User $user, $cost, $orderId)
    {
        return ($user->charge($cost, ['orderId' => $orderId]))->success;
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
}
