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
            'id'                      => $product->id,
            'title'                   => $product->title,
            'sub_title'               => $product->sub_title,
            'category'                => $product->category,
            'description'             => $product->description,
            'amount'                  => $product->amount,
            'amount_with_discount'    => $product->getAmountWithDiscount(),
            'old_amount'              => $product->old_amount,
            'slug'                    => $product->slug,
            'count'                   => $product->pivot->count,
            'is_virtual'              => $product->isVirtual,
            'discount_amount'         => $product->discount_amount,
            'discount_amount_sum'     => $product->discount_amount_sum,
            'total_sum_with_discount' => $product->getTotalSumWithDiscount(),
            'total_sum'               => $product->total_sum,
            'image'                   => $product->getFirstMediaUrl('preview'),
            'subscribe'               => ($product->plan_id) ? true : false
        ];
    }
}
