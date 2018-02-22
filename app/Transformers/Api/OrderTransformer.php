<?php

namespace App\Transformers\Api;

use App\Models\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Order $order
     *
     * @return array
     */
    public function transform(Order $order)
    {
        return [
            'id' => $order->getKey(),
            'product_cost' => $order->product_cost,
            'shipping_cost' => $order->shipping_cost,
            'total_cost' => $order->total_cost,
            'count' => $order->count,
            'state' => $order->state,
            'billing' => fractal($order->billing, new BillingTransformer()),
            'shipping' => fractal($order->shipping, new ShippingTransformer()),
        ];
    }
}
