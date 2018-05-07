<?php

use Faker\Generator as Faker;
use App\Models\CMSHomePage;

$factory->define(CMSHomePage::class, function (Faker $faker) {
    return [
        'link' => 'https://shedyourfat.com/product/12week-custom-meal-plan'
    ];
});
