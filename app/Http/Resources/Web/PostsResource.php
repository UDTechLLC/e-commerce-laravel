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
            'image'     => $this->getFirstMediaUrl('preview'),
            'views'     => $this->view_count,
            'published' => $this->posted_at->format('F jS, Y')
        ];
    }
}
