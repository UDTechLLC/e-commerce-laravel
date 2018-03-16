<?php
declare(strict_types = 1);
namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

class CouponsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->getKey(),
            'code'          => substr($this->code, 0, 50),
            'discount_type' => substr($this->discount_type, 0, 50),
            'coupon_amount' => substr($this->coupon_amount, 0, 50),
//            'title'       => "<a href='" . route('products.show', $this->slug) . "'>" . $this->title . "</a>",
            'description'   => substr($this->description, 0, 50) . "...",
            'action'        => [
                'attach' => route('admin.coupons.attach-product', $this->getKey()),
                'edit'   => route('admin.coupons.edit', $this->getKey()),
                'delete' => route('admin.coupons.delete', $this->getKey())
            ]
        ];
    }
}
