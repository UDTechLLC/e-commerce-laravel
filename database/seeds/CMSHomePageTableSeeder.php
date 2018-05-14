<?php

use Illuminate\Database\Seeder;
use App\Models\CMSHomePage;

class CMSHomePageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = factory(CMSHomePage::class)->create();
        $pathToFile = 'resources/assets/web/images/home_page/top_banner/banner_12_week_custom_plan (3).jpg';
        $pathToFileMobile =
            'resources/assets/web/images/home_page/top_banner/mobile/banner_12_week_custom_plan_mob (1).jpg';
        $banner->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('desktop');
        $banner->addMedia($pathToFileMobile)->preservingOriginal()->toMediaCollection('mobile');

        $banner = factory(CMSHomePage::class)->create();
        $pathToFile = 'resources/assets/web/images/home_page/top_banner/queen_of_the_hill_banner.jpg';
        $pathToFileMobile = 'resources/assets/web/images/home_page/top_banner/mobile/mobile_2.jpg';
        $banner->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('desktop');
        $banner->addMedia($pathToFileMobile)->preservingOriginal()->toMediaCollection('mobile');

        $banner = factory(CMSHomePage::class)->create();
        $pathToFile = 'resources/assets/web/images/home_page/top_banner/shedfat_max.jpg';
        $pathToFileMobile = 'resources/assets/web/images/home_page/top_banner/mobile/mobile_3.jpg';
        $banner->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('desktop');
        $banner->addMedia($pathToFileMobile)->preservingOriginal()->toMediaCollection('mobile');
    }
}
