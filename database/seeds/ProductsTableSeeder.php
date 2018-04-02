<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'sub_title'   => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you! Our dedicated
             team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do not want 
             you to look at this as a diet, we want you to look at this as an opportunity to lay a strong foundation
              for years to come.',

            'old_amount' => '200.00',
            'amount'     => '100.00',
            'slug'       => '12week-custom-meal-plan',
            'view_name'  => '12week-custom-meal-plan',
            'isVirtual'  => true,
            'published'  => 0

        ]);

        $pathToFile = 'resources/assets/web/seed_products/icon_12_week_custom_training_plan (3).png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties([
                'external_link' => 'https://airtable.com/shr0jIVi7hXwcM0dz',
                'view_video'    => 'https://player.vimeo.com/video/197558254'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');

        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_training_plan (2).jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Training Plan',
            'sub_title'   => '100% Personalized Training Program',
            'description' => 'Our dedicated team will develop a personalized training plan that not only makes sense, 
            but makes a real difference. Let us show you what a difference 12 weeks can actually make!',
            'old_amount'  => '200.00',
            'amount'      => '100.00',
            'slug'        => '12week-custom-training-plan',
            'view_name'   => '12week-custom-training-plan',
            'isVirtual'   => true,
            'published'   => 0
        ]);

        $pathToFile = 'resources/assets/web/seed_products/icon_12_week_custom_meal_plan (2).png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties([
                'external_link' => 'https://airtable.com/shrnGkDNeGxWGmxBV',
                'view_video'    => 'https://player.vimeo.com/video/258652601'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');

        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_meal_plan (3).jpg';
        $product
            ->addMedia($pathToFile)
            ->preservingOriginal()
            ->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Shedfat Maxx',
            'description' => 'SHEDFAT MAXX is a weight loss supplement formulated with premium ingredients to increase
             your weight loss, provide clean smooth energy and help you get past your fitness plateaus.',

//            'old_amount'  => '39.99',
            'amount'      => '39.99',
            'slug'        => 'shedfat-maxx',
            'view_name'   => 'shedfat-maxx',
            'isVirtual'   => false,

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

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Legs On Fire',
            'description' => 'Nothing beats a great pair of legs.
             The key to sculpted, lean legs is to hit those muscles from every angle. 
             Legs on Fire will guide you through this process for 30 days straight giving you both size 
             and strength in your lower body.',

            'old_amount' => '80.00',
            'amount'     => '50.00',
            'slug'       => 'legs-on-fire',
            'view_name'  => 'legs-on-fire',
            'isVirtual'  => true,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/legs.png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties([
                'external_link' => 'https://shedyourfat.com/videolibrary/legs-fire-downloads/',
                'view_video'    => 'https://player.vimeo.com/video/261638450'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/kickstarter_shop_preview.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Queen Of The Hill',
            'description' => 'You do not need to spend hundreds of dollars on a personal 
            trainer to get the results that you are after! All of the guidance that you need 
            is right here in our 90 Day, total body, gym based program. It can be accessed at
             any time from any smart device!',

            'old_amount' => '100.00',
            'amount'     => '49.00',
            'slug'       => 'queen-of-the-hill',
            'view_name'  => 'queen-of-the-hill',
            'isVirtual'  => true,

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

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Never Stop Moving',
            'description' => 'Looking for a comprehensive yet simple training plan? Never Stop Moving is our 63-day,
             total body tutorial! We teach you how to achieve and more importantly how to maintain a tighter and more
              toned physique from head to toe.',

            'old_amount' => '50.00',
            'amount'     => '34.00',
            'slug'       => 'never-stop-moving-e-book',
            'view_name'  => 'never-stop-moving-e-book',
            'isVirtual'  => true,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/devices_never.png';
        $product->addMedia($pathToFile)
            ->withCustomProperties([
                'view_video' => 'https://player.vimeo.com/video/197558254'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/Never stop moving Sales .jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/Never_stop moving e-book.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Resistance Bands',
            'description' => 'Versatility and simplicity. The addition of resistance bands to your routine, whether
             it is in the gym or in your living room, can take both your workouts and your results to the next level.',

            'old_amount' => '24.99',
            'amount'     => '19.00',
            'slug'       => 'resistance-bands',
            'view_name'  => 'resistance-bands',
            'isVirtual'  => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/resistance_bands.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/resistance_bands_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

//        $product = factory(App\Models\Product::class)->create([
//            'title' => 'KICKSTARTER',
//            'description' => '15-20 minutes of exercise each day can change your life. Start your day with a rush of
//             mood and energy boosting endorphins. Finish the day with a bang,
//             reduce stress and ensure quality sleep.',
//            'amount' => '60.00',
//            'slug' => 'kickstarter',
//            'view_name' => 'kickstarter',
//        ]);
//        $pathToFile = 'resources/assets/web/seed_products/kickstarter.png';
//        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
//        $pathToFile = 'resources/assets/web/seed_products/preview/kickstarter_shop_preview.jpg';
//        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Shedfat Infuser Bottle',
            'description' => 'Proper hydration is extremely important. 
            It effects energy levels, performance and overall well-being.  Add flavor, increase the nutritional
             value and make staying hydrated and healthy a more enjoyable process.',

            'old_amount' => '34.99',
            'amount'     => '24.00',
            'slug'       => 'shedfat-infuser-bottle',
            'view_name'  => 'shedfat-infuser-bottle',
            'isVirtual'  => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/infuser_bottle.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/infuser_bottle_spor_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');


        $product = factory(App\Models\Product::class)->create([
            'title'       => 'What to eat in the streets',
            'description' => 'The list of popular “fast food” chains with meal options that will keep you on the right 
            track with your diet guilt free.',

            'old_amount' => '39.99',
            'amount'     => '19.99',
            'slug'       => 'what-to-eat-in-the-streets',
            'view_name'  => 'what-to-eat-in-the-streets',
            'isVirtual'  => true,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/what_to_eat_in_the_streets.png';
        $product->addMedia($pathToFile)
            ->withCustomProperties([
                'view_video' => 'https://player.vimeo.com/video/261629163'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/what_to_eat_in_the_streets_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/what_to_eat_in_the_streets-1.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');


        $product = factory(App\Models\Product::class)->create([
            'title'       => '14 Day Detox Smoothie',
            'description' => 'The Power of Juice! This is the fast lane on the health highway. Whether you are 
            looking to lose weight, boost mental function or feel lighter on your feet juicing can help get you there!',

            'old_amount' => '40.00',
            'amount'     => '19.00',
            'slug'       => '14-day-detox-guide',
            'view_name'  => '14-day-detox-guide',
            'isVirtual'  => true,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/detox_product.png';
        $product->addMedia($pathToFile)
            ->withCustomProperties([
                'view_video' => 'https://player.vimeo.com/video/261520306'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/detox.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/14-Day-Smoothie-Detox-Cleanse.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Custom Meal & Workout Plan',
            'description' => 'Custom Meal & Workout Plan',
            'amount'      => '99.99',
            'slug'        => 'Custom-Meal-&-Workout-Plan',
            'category'    => 'Limited-Time Offer',
            'published'   => false,
            'isVirtual'   => true,

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

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Custom Meal & Workout Plan + email support',
            'description' => 'Custom Meal & Workout Plan + email support',
            'amount'      => '139.99',
            'slug'        => 'Custom-Meal-&-Workout-Plan-+-email_support',
            'category'    => 'Limited-Time Offer',
            'published'   => false,
            'isVirtual'   => true,
        ]);

        $pathToFile = 'resources/assets/web/seed_products/preview/challenge2.png';
        $product
            ->addMedia($pathToFile)
            ->preservingOriginal()
            ->toMediaCollection('preview');

        $product
            ->addMedia($pathToFile)
            ->preservingOriginal()
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->toMediaCollection('product');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Custom Meal & Workout Plan + email support + Maxx',
            'description' => 'Custom Meal & Workout Plan + email support + Maxx',
            'amount'      => '159.99',
            'slug'        => 'Custom-Meal-&-Workout-Plan-+-email_support-+-Maxx',
            'category'    => 'Limited-Time Offer',
            'published'   => false,
            'isVirtual'   => false,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/preview/challenge3.png';
        $product
            ->addMedia($pathToFile)
//            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'sub_title'   => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you! Our dedicated team
             knows that reaching any health and fitness goal starts with a solid nutrition plan. 
             We do want not look at this as a diet, we want you to look at this as an opportunity to lay a strong 
             foundation for years to come. That is why we offer various meal plan options that can be tailored
              to any lifestyle.',

            'old_amount' => '80.00',
            'amount'     => '30.00',
            'slug'       => '12week-custom-meal-plan+never',
            'published'  => false,
            'parent_id'  => 6,
            'isVirtual'  => true,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/never+12meal.png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/12_week_custom_meal_plan_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');


        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'sub_title'   => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you! Our dedicated team
             knows that reaching any health and fitness goal starts with a solid nutrition plan. 
             We do want not look at this as a diet, we want you to look at this as an opportunity to lay a strong 
             foundation for years to come. That is why we offer various meal plan options that can be tailored
              to any lifestyle.',

            'old_amount' => '100.00',
            'amount'     => '80.00',
            'slug'       => '12week-custom-meal-plan+queen',
            'published'  => false,
            'parent_id'  => 5,
            'isVirtual'  => true,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/queen+12week.png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/12_week_custom_meal_plan_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Shedfat Maxx Subscription',
            'plan_id'     => 2,
            'description' => 'SHEDFAT MAXX is a weight loss supplement formulated with premium ingredients to increase
             your weight loss, provide clean smooth energy and help you get past your fitness plateaus.',
            'old_amount'  => '39.99',
            'amount'      => '24.99',
            'slug'        => 'shedfat-maxx-subscription',
            'view_name'   => 'shedfat-maxx-subscription',
            'isVirtual'   => false,
            'published'   => false,
        ]);
        $pathToFile = 'resources/assets/web/seed_products/shedfat_maxx.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/maxx_icon.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'ShedFat Shaker',
            'description' => 'Our triple chamber shaker bottles offer a main fluid 
            compartment with a removable blender ball, a three section supplement 
            compartment and an additional 16oz (1 Cup) storage compartment. 
            Whether you are in the gym or out for the day you can be sure that your nutrition will not 
            be compromised.',

            'old_amount' => '24.99',
            'amount'     => '20.00',
            'slug'       => 'shedFat-shaker',
            'view_name'  => 'shedFat-shaker',
            'isVirtual'  => false,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/shaker-1.png';
        $product->addMedia($pathToFile)
            ->withCustomProperties([
                'view_video' => 'https://player.vimeo.com/video/197558254'
            ])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/shaker_2.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Gym Bag',
            'description' => 'Leaving the house for work, the gym or for a short trip is not as simple as it
             once was. Now a days, we have our wallet, electronics, gym equipment...101 items to take with us.
              Our conveniently sized bags will give you somewhere to keep all of those things so that you never 
              have to worry about needing an extra hand again',

            'old_amount' => '39.99',
            'amount'     => '20.00',
            'slug'       => 'gym-bag',
            'view_name'  => 'gym-bag',
            'isVirtual'  => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/bag2.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/bag_2.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Shedfat Dad Hat',
            'description' => 'It does not matter where you are or what you are doing, a well-fitting hat can 
            always make you feel good. The perfect blend of style and function makes this hat perfectly suited 
            for going out with friends or training both indoors and outdoors.',

            'old_amount' => '50.00',
            'amount'     => '25.00',
            'slug'       => 'shedfat-dad-hat',
            'view_name'  => 'shedfat-dad-hat',
            'isVirtual'  => false,
            'published'  => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/cap.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_Shedfat Dad Hat Sales.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');


        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Training Plan',
            'description' => 'Proper diet is key to achieving your health and fitness goals.
                        A 100% customized training plan will make you look better, feel better and maximize results!',

            'old_amount' => '100.00',
            'amount'     => '40.00',
            'parent_id'  => 1,
            'slug'       => '12-week-custom-training-plan+12week-custom-meal-plan',
            'isVirtual'  => true,
            'published'  => false,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/icon_12_week_custom_meal_plan (2).png';
        $product->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_meal_plan (3).jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');


        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'description' => 'Proper diet is key to achieving your health and fitness goals.
                        A 100% customized training plan will make you look better, feel better and maximize results!',

            'old_amount' => '100.00',
            'amount'     => '40.00',
            'parent_id'  => 2,
            'slug'       => '12-week-custom-meal-plan+12-week-custom-training-plan',
            'isVirtual'  => true,
            'published'  => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_training_plan (2).jpg';
        $product->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_12_week_custom_training_plan (1).jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');


        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'sub_title'   => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you! Our dedicated
             team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do not want 
             you to look at this as a diet, we want you to look at this as an opportunity to lay a strong foundation
              for years to come.',

            'old_amount' => '200.00',
            'amount'     => '100.00',
            'slug'       => 'bogo-12week-custom-meal-plan',
            'view_name'  => '12week-custom-meal-plan',
            'isVirtual'  => true,

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

        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Training Plan',
            'sub_title'   => '100% Personalized Training Program',
            'description' => 'Our dedicated team will develop a personalized training plan that not only makes sense, 
            but makes a real difference. Let us show you what a difference 12 weeks can actually make!',
            'old_amount'  => '200.00',
            'amount'      => '100.00',
            'slug'        => 'bogo-12week-custom-training-plan',
            'view_name'   => '12week-custom-training-plan',
            'isVirtual'   => true,

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
    }
}
