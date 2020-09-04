<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Filter::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'alias' => $faker->slug(),
    ];
});
