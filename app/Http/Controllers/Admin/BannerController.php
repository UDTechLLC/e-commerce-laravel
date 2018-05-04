<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Transformers\Api\BannerTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banners.index', [
            'banners' => Banner::all()
        ]);
    }

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
        $banner = $this->createOrUpdateBanner($request->all());

        $this->saveImageBase64($request->get('imageDesktop'), $banner, 'desktop');
        $this->saveImageBase64($request->get('imageMobile'), $banner, 'mobile');
    }

    /**
     * Return banner template.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTemplate()
    {
        return view('admin.banners.partials.template');
    }

    /**
     * @param Banner $banner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', [
            'banner' => json_encode(fractal($banner, new BannerTransformer()))
        ]);
    }

    /**
     * @param Request $request
     * @param Banner $banner
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    public function update(Request $request, Banner $banner)
    {
        $this->createOrUpdateBanner($request->all(), $banner);

        $imgDesktop = $request->get('imageDesktop');
        $imgMobile = $request->get('imageMobile');

        if ($this->checkBase64Format($imgDesktop)) {
            $this->saveImageBase64($imgDesktop, $banner, 'desktop');
        }

        if ($this->checkBase64Format($imgMobile)) {
            $this->saveImageBase64($imgMobile, $banner, 'mobile');
        }
    }

    /**
     * @param Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->back();
    }

    /**
     * @param array $data
     *
     * @param Banner|null $banner
     *
     * @return mixed
     */
    private function createOrUpdateBanner(array $data, Banner $banner = null)
    {
        $bannerId = null !== $banner ? $banner->getKey() : 0;

        return Banner::updateOrCreate(['id' => $bannerId], [
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
        $banner->clearMediaCollection($collection);

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

    /**
     * Check base64 format.
     *
     * @param string $value
     *
     * @return bool
     */
    private function checkBase64Format(string $value)
    {
        return (bool) strpos($value, 'base64');
    }
}
