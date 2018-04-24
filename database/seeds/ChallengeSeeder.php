<?php

use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Custom Meal & Workout Plan',
            'description' => 'Custom Meal & Workout Plan',
            'amount'      => '99.99',
            'slug'        => 'Custom-Meal-&-Workout-Plan',
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
            ->toMediaCollection('products');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Custom Meal & Workout Plan + email support',
            'description' => 'Custom Meal & Workout Plan + email support',
            'amount'      => '139.99',
            'slug'        => 'Custom-Meal-&-Workout-Plan-+-email_support',
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
            ->toMediaCollection('products');

        $product = factory(App\Models\Product::class)->create([
            'title'       => 'Custom Meal & Workout Plan + email support + Maxx',
            'description' => 'Custom Meal & Workout Plan + email support + Maxx',
            'amount'      => '159.99',
            'slug'        => 'Custom-Meal-&-Workout-Plan-+-email_support-+-Maxx',
            'category'    => 'Limited-Time Offer',
            'published'   => false,
            'isVirtual'   => false,
            'visible'     => false

        ]);

        $pathToFile = 'resources/assets/web/seed_products/preview/challenge3.png';
        $product
            ->addMedia($pathToFile)
//            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->preservingOriginal()
            ->toMediaCollection('preview');

        $product
            ->addMedia($pathToFile)
            ->preservingOriginal()
            ->withCustomProperties(['external_link' => 'https://airtable.com/shrHWsoXhJhrWcMYT'])
            ->toMediaCollection('products');
    }
}
