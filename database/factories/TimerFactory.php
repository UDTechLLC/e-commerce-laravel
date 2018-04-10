<?php

use Faker\Generator as Faker,
    App\Models\Timer;

$factory->define(Timer::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'value' => \Carbon\Carbon::now()->addDay()
    ];
});
