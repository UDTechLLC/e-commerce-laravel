<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Transformers\Api\BannerTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function all()
    {
        return fractal(Banner::all(), new BannerTransformer());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * @param Request $request
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    public function store(Request $request)
    {
        $banner = $this->createBanner($request->all());

        $this->saveImageBase64($request->get('imageDesktop'), $banner, 'desktop');
        $this->saveImageBase64($request->get('imageMobile'), $banner, 'mobile');
    }

    /**
     * Return banner template.
     */
    public function getTemplate()
    {
        //
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    private function createBanner(array $data)
    {
        return Banner::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link'],
        ]);
    }

    /**
     * @param string $base64Data
     * @param Banner $banner
     * @param string $collection
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    private function saveImageBase64(string $base64Data, Banner $banner, string $collection)
    {
        $imageType = $this->getImageTypeFromBase64($base64Data);

        $banner->addMediaFromBase64($base64Data)
            ->usingFileName("{$banner->title}_{$collection}.{$imageType}")
            ->toMediaCollection($collection);
    }

    /**
     * @param string $data
     *
     * @return mixed
     */
    private function getImageTypeFromBase64(string $data)
    {
        $pos  = strpos($data, ';');

        return explode('/', substr($data, 0, $pos))[1];
    }
}
