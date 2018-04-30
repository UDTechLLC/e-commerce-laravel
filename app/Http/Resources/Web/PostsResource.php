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
            'content' => $this->content,
            'slug'      => $this->slug,
            'preview'     => $this->getFirstMediaUrl('preview'),
            'image' => $this->getFirstMediaUrl('banner'),
            'category_id' => $this->category_id,
            'published' => $this->published,
            'views'     => $this->view_count,
            'posted_at' => $this->posted_at->format('F jS, Y'),
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
        ];
    }
}
