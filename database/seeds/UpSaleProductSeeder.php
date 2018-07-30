<?php

use Illuminate\Database\Seeder;

class UpSaleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Shedfat Maxx',
            'description' => 'SHEDFAT MAXX is a weight loss supplement formulated with premium ingredients to increase
             your weight loss, provide clean smooth energy and help you get past your fitness plateaus.',

//            'old_amount'  => '39.99',
            'amount'      => '19.00',
            'slug'        => 'shedfat-maxx-up-sale',
            'view_name'   => 'shedfat-maxx',
            'isVirtual'   => false,
            'published'  => false,
            'visible'    => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/shedfat_maxx.png';
        $product->addMedia($pathToFile)
            ->withCustomProperties([
                'view_video' => 'https://player.vimeo.com/video/260858063'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/maxx_icon.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        
        /*************/

        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'sub_title'   => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you! Our dedicated
             team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do not want 
             you to look at this as a diet, we want you to look at this as an opportunity to lay a strong foundation
              for years to come.',

            'old_amount' => '200.00',
            'amount'     => '100.00',
            'slug'       => '12week-custom-meal-plan-up-sale',
            'view_name'  => '12week-custom-meal-plan',
            'isVirtual'  => true,
            'published'  => false,
            'visible'    => false,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/icon_12_week_custom_training_plan (2).png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties([
                'external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT',
                'view_video'    => 'https://player.vimeo.com/video/197558254'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');

        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_training_plan (1).jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        
        /*****************/
        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Training Plan',
            'sub_title'   => '100% Personalized Training Program',
            'description' => 'Our dedicated team will develop a personalized training plan that not only makes sense, 
            but makes a real difference. Let us show you what a difference 12 weeks can actually make!',
            'old_amount'  => '200.00',
            'amount'      => '100.00',
            'slug'        => '12week-custom-training-plan-up-sale',
            'view_name'   => '12week-custom-training-plan',
            'isVirtual'   => true,
            'published'  => false,
            'visible'    => false,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/icon_12_week_custom_meal_plan_2.png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties([
                'external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT',
                'view_video'    => 'https://player.vimeo.com/video/258652601'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');

        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_meal_plan (2).jpg';
        $product
            ->addMedia($pathToFile)
            ->preservingOriginal()
            ->toMediaCollection('preview');
        
        /**************/
        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Queen Of The Hill',
            'description' => 'You do not need to spend hundreds of dollars on a personal 
            trainer to get the results that you are after! All of the guidance that you need 
            is right here in our 90 Day, total body, gym based program. It can be accessed at
             any time from any smart device!',

            'old_amount' => '100.00',
            'amount'     => '19.00',
            'slug'       => 'queen-of-the-hill-up-sale',
            'view_name'  => 'queen-of-the-hill',
            'isVirtual'  => true,
            'published'  => false,
            'visible'    => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/Queen_of_the_Hill_90_Day_icon_2.png';
        $product->addMedia($pathToFile)
            ->withCustomProperties([
                'view_video' => 'https://player.vimeo.com/video/261500084'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/Queen_of_the_Hill_90_Day_icon_1.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/E-book_queen_of_the_hill.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');

        /****************/
        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Custom Meal & Workout Plan',
            'description' => 'Custom Meal & Workout Plan',
            'amount'      => '99.99',
            'slug'        => 'Custom-Meal-&-Workout-Plan-up-sale',
            'category'    => 'Limited-Time Offer',
            'published'   => false,
            'isVirtual'   => true,
            'visible'     => false
        ]);

        $pathToFile = 'resources/assets/web/seed_products/preview/challenge1.png';
        $product
            ->addMedia($pathToFile)
            ->preservingOriginal()
            ->toMediaCollection('preview');
        $product
            ->addMedia($pathToFile)
            ->preservingOriginal()
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->toMediaCollection('product');
    }
}
