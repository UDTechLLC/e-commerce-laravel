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
            'title' => '12 Week Custom Training Plan',
            'sub_title' => '100% Personalized Training Program',
            'description' => 'Our dedicated team will develop a personalized training plan that not only makes sense, 
            but makes a real difference. Let us show you what a difference 12 weeks can actually make!',
            'old_amount' => '100.00',
            'amount' => '5000',
            'slug' => '12week-custom-training-plan',
            'view_name' => '12week-custom-training-plan',
        ]);
        $pathToFile = 'resources/assets/web/seed_products/12_week_cutom_training_plan.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/shop_icon_12_week_custom_training_plan.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title' => '12 Week Custom Meal Plan',
            'sub_title' => '100% Personalized Meal Program',
            'description' => 'Training is important but nutrition is what can make or break you!  Our dedicated
             team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do not want 
             you to look at this as  a diet, we want you to look at this as an opportunity to lay a strong foundation
              for years to come',
            'old_amount' => '100.00',
            'amount' => '5000',
            'slug' => '12week-custom-meal-plan',
            'view_name' => '12week-custom-meal-plan',
        ]);
        $pathToFile = 'resources/assets/web/seed_products/12_week_cutom_meal_plan.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/12_week_custom_meal_plan_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title' => 'SHEDFAT MAXX',
            'description' => 'SHEDFAT MAXX is a weight loss supplement formulated with premium ingredients to increase
             your weight loss, provide clean smooth energy and help you get past your fitness plateaus.',
            'old_amount' => '59.99',
            'amount' => '2499',
            'slug' => 'shedfat-maxx',
            'view_name' => 'show',
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
            'title' => 'SHEDFAT INFUSER BOTTLE',
            'description' => 'Proper hydration is extremely important. It effects energy levels, performance and 
            overall well-being.  Add flavor, increase the nutritional value and make staying hydrated and healthy
             a more enjoyable process.',
            'old_amount' => '40.00',
            'amount' => '2500',
            'slug' => 'shedfat-infuser-bottle',
            'view_name' => 'shedfat-infuser-bottle',
        ]);
        $pathToFile = 'resources/assets/web/seed_products/infuser_bottle.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/infuser_bottle_spor_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title' => 'RESISTANCE BANDS',
            'description' => 'Versatility and simplicity. The addition of resistance bands to your routine, whether
             it is in the gym or in your living room, can take both your workouts and your results to the next level.',
            'old_amount' => '40.00',
            'amount' => '2500',
            'slug' => 'resistance-bands',
            'view_name' => 'resistance-bands',
        ]);
        $pathToFile = 'resources/assets/web/seed_products/resistance_bands.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/resistance_bands_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title' => 'NEVER STOP MOVING',
            'description' => 'Looking for a comprehensive yet simple training plan? Never Stop Moving is our 63-day,
             total body tutorial! We teach you how to achieve and more importantly how to maintain a tighter and more
              toned physique from head to toe.',
            'old_amount' => '50.00',
            'amount' => '3000',
            'slug' => 'never-stop-moving-e-book',
            'view_name' => 'never-stop-moving-e-book',
        ]);
        $pathToFile = 'resources/assets/web/seed_products/never_stop_moving.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/icon_Never-stop-moving-Sales-2.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title' => 'WHAT TO EAT IN THE STREETS',
            'description' => 'The list of popular “fast food” chains with meal options that will keep you on the right 
            track with your diet guilt free.',
            'old_amount' => '50.00',
            'amount' => '1900',
            'slug' => 'what-to-eat-in-the-streets',
            'view_name' => 'what-to-eat-in-the-streets',
        ]);
        $pathToFile = 'resources/assets/web/seed_products/what_to_eat_in_the_streets.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/what_to_eat_in_the_streets_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title' => 'QUEEN OF THE HILL',
            'description' => 'You do not need to spend hundreds of dollars on a personal 
            trainer to get the results that you are after! All of the guidance that you need 
            is right here in our 90 Day, total body, gym based program. It can be accessed at
             any time from any smart device!',
            'old_amount' => '99.00',
            'amount' => '5000',
            'slug' => 'queen-of-the-hill',
            'view_name' => 'queen-of-the-hill',
        ]);
        $pathToFile = 'resources/assets/web/seed_products/queen_of_the_hill.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/Queen-of-the-Hill_90-Day_icon.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');

        $product = factory(App\Models\Product::class)->create([
            'title' => '14 DAY DETOX SMOOTHIE CLEANSE',
            'description' => 'The Power of Juice! This is the fast lane on the health highway. Whether you are 
            looking to lose weight, boost mental function or feel lighter on your feet juicing can help get you there!',
            'old_amount' => '40.00',
            'amount' => '2000',
            'slug' => '14-day-detox-guide',
            'view_name' => '14-day-detox-guide',
        ]);
        $pathToFile = 'resources/assets/web/seed_products/14_day_detox_smoothie_cleanse.png';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('products');
        $pathToFile = 'resources/assets/web/seed_products/preview/14_day_detox_smoothie_cleanse_shop_preview.jpg';
        $product->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
    }
}
