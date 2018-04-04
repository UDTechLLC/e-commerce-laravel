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
            'id'          => "<a href='" . route('admin.orders.edit', $this->getKey()) . "'>" . $this->getKey() ."</a>",
            'full name'   => $this->billing->full_name,
            'email'       => $this->billing->email,
            'ship to'     => $this->getShipping(),
            'coupon code' => ($this->coupon_id) ? $this->coupon->code : "-",
            'total cost'  => $this->total_cost,
            'state'       => $this->state,
            'date'        => $this->created_at->format('M j, Y H:i'),
        ];
    }


    /**
     * @return string
     */
    private function getShipping():string
    {
        return ($this->shipping_id && $this->isShipping()) ?
            "{$this->shipping->full_name} {$this->shipping->company_name},
                {$this->shipping->street} str,
                {$this->shipping->country}, {$this->shipping->city} ,
                {$this->shipping->state}, {$this->shipping->postcode}" : "-";
    }

    /**
     * @return string
     */
    private function getBilling():string
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
