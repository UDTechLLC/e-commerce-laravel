<?php

use Faker\Generator as Faker;
use App\Models\Cart;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'product_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
