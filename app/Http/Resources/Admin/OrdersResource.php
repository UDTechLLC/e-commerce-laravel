<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

class OrdersResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->getKey(),
            'user' =>  ($this->user) ? "{$this->user->full_name}  {$this->user->email} " : " ",
            'shipping' =>  'd'
        ];
    }
}
