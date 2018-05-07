<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

class CMSHomePageResource extends Resource
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
            'id'           => $this->getKey(),
            'link'         => $this->link,
            'desktopImage' => $this->desktopImage,
            'mobileImage'  => $this->mobileImage
        ];
    }
}
