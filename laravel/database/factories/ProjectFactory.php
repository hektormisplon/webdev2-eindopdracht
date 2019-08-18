<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence(6),
        'info' => $faker->sentence(10),
        'deadline' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'category_id' => 1,
        'owner_id' => 1
    ];
});
