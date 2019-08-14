<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1),
        'description' => $faker->sentence(20),
        'body' => $faker->sentence(500),
        'author' => $faker->name
    ];
});
