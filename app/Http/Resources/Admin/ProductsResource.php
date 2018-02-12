<?php
declare(strict_types = 1);

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

/**
 * Class ProductsResource
 * @package App\Http\Resources\Admin
 */
class ProductsResource extends Resource
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
            'id'          => $this->getKey(),
            'title'       => "<a href='" . route('admin') . "'>" . $this->title . "</a>",
            'category'    => $this->category,
            'description' => substr($this->description, 0, 50) . "...",
            'action'      => [
                'edit'   => 1,
                'delete' => route('admin.products.delete', $this->getKey())
            ]
        ];
    }
}