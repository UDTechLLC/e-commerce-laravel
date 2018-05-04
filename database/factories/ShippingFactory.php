<?php

use Faker\Generator as Faker;
use App\Models\Shipping;

$factory->define(Shipping::class, function (Faker $faker) {
    return [
        'country' => Shipping::USA,
        'cost'    => 6.99,
        'isFree'  => false
    ];
});
