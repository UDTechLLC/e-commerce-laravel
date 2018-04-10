<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\Orders\ShipStationService;
use Illuminate\Console\Command;

class UpdateShipstationOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update orders id on shipstation';

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
        $orders = Order::limit(222)->get();

        /** @var Order $order */
        foreach ($orders as $order) {
            $this->changeOrderId($order);
            
            if ($order->isShipping()) {
                $this->sendOrderToShipStation($order);

                $this->info("Order {$order->order_id} was sent to shipstation");
            }
        }
    }

    /**
     * Change order_id of order.
     *
     * @param Order $order
     */
    private function changeOrderId(Order $order)
    {
        $order->update([
            'order_id' => 'SF' . $order->getKey(),
        ]);
    }

    /**
     * @param Order $order
     */
    private function sendOrderToShipStation(Order $order)
    {
        $service = new ShipStationService($order);

        $service->create();
    }
}
