<?php

declare(strict_types = 1);

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    public function created(Order $order)
    {
        $order->update([
            'order_id' => 'SF' . $order->getKey(),
        ]);
    }
}
