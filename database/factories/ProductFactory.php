<?php

use Faker\Generator as Faker,
    App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
//        'description' => $faker->paragraph,
        'amount' => $faker->numberBetween($min = 100, $max = 1000),
        'slug' => $faker->slug()
    ];
});
