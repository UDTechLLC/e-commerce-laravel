<?php

declare(strict_types = 1);

namespace App\Services\Orders;

use LaravelShipStation\Models\Address;
use LaravelShipStation\Models\Order;
use LaravelShipStation\Models\OrderItem;
use App\Models\Order as ModelOrder;
use PhpParser\Node\Expr\AssignOp\Mod;

/**
 * Class ShipStationService.
 *
 * @package App\Services\Orders
 */
class ShipStationService
{
    const AWAITING_PAYMENT_STATUS = 'awaiting_payment';
    const AWAITING_SHIPMENT_STATUS = 'awaiting_shipment';
    const SHIPPED_STATUS = 'shipped';
    const ON_HOLD_STATUS = 'on_hold';
    const CANCELED_STATUS = 'canceled';

    /** @var ModelOrder $order */
    protected $order;

    /** @var \LaravelShipStation\ShipStation */
    protected $shipStation;

    /**
     * ShipStationService constructor.
     *
     * @param ModelOrder $order
     */
    public function __construct(ModelOrder $order)
    {
        $this->order = $order;
        $this->shipStation = app()->make('LaravelShipStation\ShipStation');
    }

    public function update()
    {
        return $this->create();
    }

    /**
     * @return \stdClass
     */
    public function create()
    {
        $billing = $this->order->billing;
        $shipping = $this->order->shipping;

        $billingAddress = $this->createAddress($billing);
        $shippingAddress = $shipping
            ? $this->createAddress($shipping)
            : $billingAddress;
        $items = $this->createItems();
        $order = $this->createOrder($billingAddress, $shippingAddress, $items);

        return $this->shipStation->post($order, 'createorder');
    }

    /**
     * @param $destination
     *
     * @return Address
     */
    private function createAddress($destination)
    {
        $address = new Address();

        $address->name = $destination->full_name;
        $address->street1 = $destination->street;
        $address->city = $destination->city;
        $address->state = $destination->state;
        $address->postalCode = $destination->postcode;
        $address->country = $destination->iso_3166;
        $address->phone = $destination->phone;

        return $address;
    }

    /**
     * @return array
     */
    private function createItems()
    {
        $items = [];
        $products = $this->order->products;

        foreach ($products as $product) {
            $item = new OrderItem();

            $item->lineItemKey = $product->getKey();
            $item->sku = $product->getKey();
            $item->name = $product->title;
            $item->quantity = $product->pivot->count;
            $item->unitPrice = $product->amount;
//            $item->warehouseLocation = 'Warehouse A';

            $items[] = $item;
        }

        return $items;
    }

    private function createOrder($billingAddress, $shippingAddress, $items)
    {
        $order = new Order();

        $order->orderNumber = $this->order->getKey();
        $order->orderKey = $this->order->order_key;
        $order->orderDate = now()->toDateString();
        $order->orderStatus = $this->mapStatus($this->order->state);
        $order->amountPaid = $this->order->total_cost;
        $order->taxAmount = '0.00';
        $order->shippingAmount = $this->order->shipping_cost;
        $order->internalNotes = 'A note about my order.';
        $order->billTo = $billingAddress;
        $order->shipTo = $shippingAddress;
        $order->items = $items;

        return $order;
    }

    private function mapStatus(string $state)
    {
        $map = [
            ModelOrder::ORDER_STATE_CANCELED        => self::CANCELED_STATUS,
            ModelOrder::ORDER_STATE_ON_HOLD         => self::ON_HOLD_STATUS,
            ModelOrder::ORDER_STATE_PENDING_PAYMENT => self::AWAITING_PAYMENT_STATUS,
            ModelOrder::ORDER_STATE_PROCESSING      => self::AWAITING_SHIPMENT_STATUS,
            ModelOrder::ORDER_STATE_SHIPPED         => self::SHIPPED_STATUS,
        ];

        return $map[$state];
    }
}
