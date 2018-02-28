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
            'title'       => '12 Week Custom Training Plan',
            'sub_title'   => '100% Personalized Training Program',
            'description' => 'Our dedicated team will develop a personalized training plan that not only makes sense, 
            but makes a real difference. Let us show you what a difference 12 weeks can actually make!',
            'old_amount'  => '100.00',
            'amount'      => '50.00',
            'slug'        => '12week-custom-training-plan',
            'view_name'   => '12week-custom-training-plan',
            'isVirtual'   => true,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/12_week_cutom_training_plan.png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrnGkDNeGxWGmxBV'])
            ->preservingOriginal()
            ->toMediaCollection('products');

        $pathToFile = 'resources/assets/web/seed_products/preview/shop_icon_12_week_custom_training_plan.jpg';
        $product
            ->addMedia($pathToFile)
            ->preservingOriginal()
            ->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => '12 Week Custom Meal Plan',
            'sub_title'   => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you! Our dedicated
             team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do not want 
             you to look at this as a diet, we want you to look at this as an opportunity to lay a strong foundation
              for years to come.',

            'old_amount'  => '100.00',
            'amount'      => '50.00',
            'slug'        => '12week-custom-meal-plan',
            'view_name'   => '12week-custom-meal-plan',
            'isVirtual'   => true,

        ]);

        $pathToFile = 'resources/assets/web/seed_products/12_week_cutom_meal_plan.png';
        $product
            ->addMedia($pathToFile)
            ->withCustomProperties(['external_link' => 'https://airtable.com/shr0jIVi7hXwcM0dz'])
            ->preservingOriginal()
            ->toMediaCollection('products');

        $pathToFile = 'resources/assets/web/seed_products/preview/12_week_custom_meal_plan_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Shedfat Maxx',
            'description' => 'SHEDFAT MAXX is a weight loss supplement formulated with premium ingredients to increase
             your weight loss, provide clean smooth energy and help you get past your fitness plateaus.',

            'old_amount'  => '59.99',
            'amount'      => '24.99',
            'slug'        => 'shedfat-maxx',
            'view_name'   => 'shedfat-maxx',
            'isVirtual'   => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/shedfat_maxx.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/maxx_icon.jpg';
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
            'title'       => 'Shadfat Infuser Bottle',
            'description' => 'Proper hydration is extremely important. It effects energy levels, performance and 
            overall well-being.  Add flavor, increase the nutritional value and make staying hydrated and healthy
             a more enjoyable process.',

            'old_amount'  => '40.00',
            'amount'      => '25.00',
            'slug'        => 'shedfat-infuser-bottle',
            'view_name'   => 'shedfat-infuser-bottle',
            'isVirtual'   => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/infuser_bottle.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/infuser_bottle_spor_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Resistance Bands',
            'description' => 'Versatility and simplicity. The addition of resistance bands to your routine, whether
             it is in the gym or in your living room, can take both your workouts and your results to the next level.',

            'old_amount'  => '40.00',
            'amount'      => '25.00',
            'slug'        => 'resistance-bands',
            'view_name'   => 'resistance-bands',
            'isVirtual'   => false,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/resistance_bands.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/resistance_bands_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Never Stop Moving',
            'description' => 'Looking for a comprehensive yet simple training plan? Never Stop Moving is our 63-day,
             total body tutorial! We teach you how to achieve and more importantly how to maintain a tighter and more
              toned physique from head to toe.',

            'old_amount'  => '50.00',
            'amount'      => '30.00',
            'slug'        => 'never-stop-moving-e-book',
            'view_name'   => 'never-stop-moving-e-book',
            'isVirtual'   => true,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/never-stop-icon.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_Never-stop-moving-Sales-2.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/Never_stop moving e-book.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'What to eat in the streets',
            'description' => 'The list of popular “fast food” chains with meal options that will keep you on the right 
            track with your diet guilt free.',

            'old_amount'  => '50.00',
            'amount'      => '19.00',
            'slug'        => 'what-to-eat-in-the-streets',
            'view_name'   => 'what-to-eat-in-the-streets',
            'isVirtual'   => true,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/what_to_eat_in_the_streets.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/what_to_eat_in_the_streets_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/what_to_eat_in_the_streets-1.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Queen Of The Hill',
            'description' => 'You do not need to spend hundreds of dollars on a personal 
            trainer to get the results that you are after! All of the guidance that you need 
            is right here in our 90 Day, total body, gym based program. It can be accessed at
             any time from any smart device!',

            'old_amount'  => '99.00',
            'amount'      => '50.00',
            'slug'        => 'queen-of-the-hill',
            'view_name'   => 'queen-of-the-hill',
            'isVirtual'   => true,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/queen_of_the_hill.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/Queen-of-the-Hill_90-Day_icon.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/E-book_queen_of_the_hill.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');

        $product = factory(App\Models\Product::class)->create([
            'title'       => '14 Day Detox Smoothie Cleanse',
            'description' => 'The Power of Juice! This is the fast lane on the health highway. Whether you are 
            looking to lose weight, boost mental function or feel lighter on your feet juicing can help get you there!',

            'old_amount'  => '40.00',
            'amount'      => '20.00',
            'slug'        => '14-day-detox-guide',
            'view_name'   => '14-day-detox-guide',
            'isVirtual'   => true,

        ]);
        $pathToFile = 'resources/assets/web/seed_products/14_day_detox_smoothie_cleanse.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/14_day_detox_smoothie_cleanse_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/14-Day-Smoothie-Detox-Cleanse.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');
    }
}
