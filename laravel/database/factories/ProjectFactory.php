<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {

    $goal = $faker->numberBetween($min = 100, $max = 10000);
    $pledged = $faker->numberBetween($min = 0, $max = $goal);
    return [
        'title' => $faker->word,
        'description' => $faker->sentence(6),
        'info' => $faker->sentence(10),
        'deadline' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'category_id' => $faker->numberBetween($min = 1, $max = 3),
        'owner_id' => $faker->numberBetween($min = 1, $max = 3),
        'goal' => $goal,
        'pledged' => $pledged
    ];
});
