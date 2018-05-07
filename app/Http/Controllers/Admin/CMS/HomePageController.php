<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Resources\Admin\CMSHomePageResource;
use App\Models\CMSHomePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index()
    {
        return view('admin.cms.homepage.index', [
            'banners' => CMSHomePage::all()
        ]);
    }

    public function edit(CMSHomePage $CMSHomePage)
    {
        return view('admin.cms.homepage.edit', [
            'banner' => json_encode(new CMSHomePageResource($CMSHomePage))
        ]);
    }

    public function update(Request $request, CMSHomePage $CMSHomePage)
    {
        $CMSHomePage->update($request->all());

        $imgDesktop = $request->get('imageDesktop');
        $imgMobile = $request->get('imageMobile');

        if ($this->checkBase64Format($imgDesktop)) {
            $this->saveImageBase64($imgDesktop, $CMSHomePage, 'desktop');
        }

        if ($this->checkBase64Format($imgMobile)) {
            $this->saveImageBase64($imgMobile, $CMSHomePage, 'mobile');
        }
    }

    /**
     * @param string $base64Data
     * @param CMSHomePage $homePage
     * @param string $collection
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    private function saveImageBase64(string $base64Data, CMSHomePage $homePage, string $collection)
    {
        $homePage->clearMediaCollection($collection);

        $imageType = $this->getImageTypeFromBase64($base64Data);

        $homePage->addMediaFromBase64($base64Data)
            ->usingFileName("{$collection}.{$imageType}")
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
