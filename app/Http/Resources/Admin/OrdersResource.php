<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

class OrdersResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->getKey(),
            'user'          => ($this->user) ? $this->getUser() :
                "{$this->billing->first_name} {$this->billing->last_name}, <br> {$this->billing->email}",
            'shipping'      => $this->getShipping(),
            'billing'       => $this->getBilling(),
            'date'          => $this->created_at->format('M j, Y H:i'),
            'product cost'  => $this->product_cost,
            'coupon code'   => ($this->coupon_id) ? $this->coupon->code : "-",
            'shipping cost' => $this->shipping_cost,
            'total cost'    => $this->total_cost,
            'count'         => $this->count,
            'state'         => $this->state
        ];
    }

    private function getUser()
    {
        return "{$this->user->full_name}  {$this->user->email}";
    }

    private function getShipping()
    {
        return ($this->shipping_id && $this->isShipping()) ? "{$this->shipping->full_name} {$this->shipping->company_name},
                  {$this->shipping->street} str,
                  {$this->shipping->country}, {$this->shipping->city} ,
                  {$this->shipping->state}, {$this->shipping->postcode}" : "-";
    }

    private function getBilling()
    {
        $billing = $this->billing->full_name;

        if ($this->isShipping()) {
            $billing .= "{$this->billing->company_name}, {$this->billing->street} str,
                  {$this->billing->country}, {$this->billing->city} ,
                  {$this->billing->state}, {$this->billing->postcode}</td>";
        }

        return $billing;

    }
}
