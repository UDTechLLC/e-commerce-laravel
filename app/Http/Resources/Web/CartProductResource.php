<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\Resource;

class CartProductResource extends Resource
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
            'id'     => $this->id,
            'title'  => $this->title,
            'amount' => $this->amount,
            'image'  => $this->getFirstMediaUrl('preview')
        ];
    }
}
