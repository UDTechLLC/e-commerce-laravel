<?php
declare (strict_types = 1);

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

/**
 * Class OrdersResource
 * @package App\Http\Resources\Admin
 */
class OrdersResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request):array
    {
        return [
            'id'          => "<a href='" .
                route('admin.orders.edit', $this->getKey())
                . "'>" . $this->getKey() . "</a>",
            'user name'   => $this->billing->full_name,
            'email'       => $this->billing->email,
            'ship to'     => $this->getShipping(),
            'coupon code' => ($this->coupon_id) ? $this->coupon->code : "-",
            'total cost'  => $this->total_cost,
            'status'      => $this->state,
            'date'        => $this->created_at->format('M j, Y H:i'),
        ];
    }


    /**
     * @return string
     */
    private function getShipping():string
    {
        if ($this->shipping_id) {
            return $this->getAddress($this->shipping);
        } elseif ($this->isShipping()) {
            return $this->getAddress($this->billing);
        } else {
            return '-';
        }
    }

    /**
     * @param $address
     * @return string
     */
    private function getAddress($address)
    {
        return "{$address->street} str, {$address->apartment}
                {$address->country}, {$address->city} ,
                {$address->state}, {$address->postcode}";
    }
}
