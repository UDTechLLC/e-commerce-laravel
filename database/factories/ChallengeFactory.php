<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Challenge::class, function (Faker $faker) {
    return [
        'title' => $faker->company
    ];
});
