<?php

namespace App\Transformers\Api;

use App\Models\Banner;
use League\Fractal\TransformerAbstract;

class BannerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Banner $banner
     *
     * @return array
     */
    public function transform(Banner $banner)
    {
        return [
            'id'           => $banner->getKey(),
            'title'        => $banner->title,
            'link'         => $banner->link,
            'description'  => $banner->description,
            'imageDesktop' => $banner->getFirstMediaUrl('desktop'),
            'imageMobile'  => $banner->getFirstMediaUrl('mobile'),
        ];
    }
}
