<?php

use Illuminate\Database\Seeder;

class SocialProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'sub_title'   => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you! Our dedicated
             team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do not want 
             you to look at this as a diet, we want you to look at this as an opportunity to lay a strong foundation
              for years to come.',

            'old_amount' => '200.00',
            'amount'     => '100.00',
            'slug'       => '12week-custom-meal-plan-FB',
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

        $bundle = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Training Plan',
            'description' => 'Proper diet is key to achieving your health and fitness goals.
                        A 100% customized training plan will make you look better, feel better and maximize results!',

            'old_amount' => '100.00',
            'amount'     => '40.00',
            'parent_id'  => $product->getKey(),
            'slug'       => '12-week-custom-training-plan+12week-custom-meal-plan-FB',
            'isVirtual'  => true,
            'published'  => false,
            'visible'    => false
        ]);

        $pathToFile = 'resources/assets/web/seed_products/icon_12_week_custom_meal_plan (2).png';
        $bundle->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_meal_plan (3).jpg';
        $bundle->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        /******************/
        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Training Plan',
            'sub_title'   => '100% Personalized Training Program',
            'description' => 'Our dedicated team will develop a personalized training plan that not only makes sense, 
            but makes a real difference. Let us show you what a difference 12 weeks can actually make!',
            'old_amount'  => '200.00',
            'amount'      => '100.00',
            'slug'        => '12week-custom-training-plan-FB',
            'view_name'   => '12week-custom-training-plan',
            'isVirtual'   => true,
            'published'   => false,
            'visible'     => false,

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

        $bundle = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'description' => 'Proper diet is key to achieving your health and fitness goals.
                        A 100% customized training plan will make you look better, feel better and maximize results!',

            'old_amount' => '100.00',
            'amount'     => '40.00',
            'parent_id'  => $product->getKey(),
            'slug'       => '12-week-custom-meal-plan+12-week-custom-training-plan-FB',
            'isVirtual'  => true,
            'published'  => false,
            'visible'    => false
        ]);
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_training_plan (2).jpg';
        $bundle->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_training_plan (1).jpg';
        $bundle->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        /***********************/
        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'sub_title'   => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you! Our dedicated
             team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do not want 
             you to look at this as a diet, we want you to look at this as an opportunity to lay a strong foundation
              for years to come.',

            'old_amount' => '200.00',
            'amount'     => '100.00',
            'slug'       => '12week-custom-meal-plan-GO',
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

        $bundle = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Training Plan',
            'description' => 'Proper diet is key to achieving your health and fitness goals.
                        A 100% customized training plan will make you look better, feel better and maximize results!',

            'old_amount' => '100.00',
            'amount'     => '40.00',
            'parent_id'  => $product->getKey(),
            'slug'       => '12-week-custom-training-plan+12week-custom-meal-plan-GO',
            'isVirtual'  => true,
            'published'  => false,
            'visible'    => false
        ]);

        $pathToFile = 'resources/assets/web/seed_products/icon_12_week_custom_meal_plan (2).png';
        $bundle->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_meal_plan (3).jpg';
        $bundle->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        /******************/
        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Training Plan',
            'sub_title'   => '100% Personalized Training Program',
            'description' => 'Our dedicated team will develop a personalized training plan that not only makes sense, 
            but makes a real difference. Let us show you what a difference 12 weeks can actually make!',
            'old_amount'  => '200.00',
            'amount'      => '100.00',
            'slug'        => '12week-custom-training-plan-GO',
            'view_name'   => '12week-custom-training-plan',
            'isVirtual'   => true,
            'published'   => false,
            'visible'     => false,
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

        $bundle = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'description' => 'Proper diet is key to achieving your health and fitness goals.
                        A 100% customized training plan will make you look better, feel better and maximize results!',

            'old_amount' => '100.00',
            'amount'     => '40.00',
            'parent_id'  => $product->getKey(),
            'slug'       => '12-week-custom-meal-plan+12-week-custom-training-plan-GO',
            'isVirtual'  => true,
            'published'  => false,
            'visible'    => false
        ]);
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_training_plan (2).jpg';
        $bundle->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_training_plan (1).jpg';
        $bundle->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
    }
}
