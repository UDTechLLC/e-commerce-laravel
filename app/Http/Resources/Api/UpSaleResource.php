<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class UpSaleResource extends Resource
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
            'id'          => $this->id,
            'title'       => $this->title,
            'slug'        => $this->slug,
            'sub_title'   => $this->sub_title,
            'description' => $this->description,
            'old_amount'  => $this->old_amount,
            'amount'      => $this->amount,
            'image'       => $this->getFirstMediaUrl('preview')
        ];
    }
}
