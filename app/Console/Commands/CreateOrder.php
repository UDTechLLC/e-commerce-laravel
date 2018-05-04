<?php

namespace App\Console\Commands;

use App\Mail\OrderSent;
use App\Models\Order;
use App\Services\Orders\ShipStationService;
use Illuminate\Console\Command;

class CreateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:create {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create duplicate order';

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
        $order = Order::where('order_id', $this->argument('id'))->first();

        $newOrder = $this->createOrder($order);

        $this->info('Created order id is ' . $newOrder->getKey());

        $this->sendOrderToShipStation($newOrder);
        $this->sendOrderToEmail($newOrder);
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
