<?php

namespace App\Transformers\Api;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Product $product
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id'     => $product->id,
            'title'  => $product->title,
            'sub_title' => $product->sub_title,
            'category' => $product->category,
            'description' => $product->description,
            'amount' => $product->amount,
            'old_amount' => $product->old_amount,
            'slug'   => $product->slug,
            'count'  => $product->pivot->count,
            'is_virtual' => $product->isVirtual,
            'total_sum' => $product->amount * $product->pivot->count,
            'image'  => $product->getFirstMediaUrl('preview')
        ];
    }
}
