<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\Resource;

class PostsResource extends Resource
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
            'id'        => $this->id,
            'title'     => $this->title,
            'slug'      => $this->slug,
            'image'     => $this->getFirstMediaUrl('view_count'),
            'views'     => $this->views,
            'published' => $this->posted_at->format('F jS, Y')
        ];
    }
}
