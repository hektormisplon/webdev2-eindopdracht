<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectImage;
use Faker\Generator as Faker;

$factory->define(ProjectImage::class, function (Faker $faker) {
    return [
        'filepath' => $faker->imageUrl($width = 1200, $height = 900, 'technics'),
        'filename' => '',
        'project_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
