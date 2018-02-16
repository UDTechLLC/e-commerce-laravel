<?php

use Faker\Generator as Faker;
use App\Models\Cart;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'user_id' => 1,
    ];
});
