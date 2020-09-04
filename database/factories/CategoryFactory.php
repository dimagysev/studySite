<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'alias' => $faker->slug,
        'parent_id' => 0
    ];
});
