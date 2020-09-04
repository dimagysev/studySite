<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Portfolio::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'alias' => $faker->slug,
        'text' => $faker->text(50),
        'customer'=> $faker->name,
        'img' => json_encode([
            'mini' => $faker->image(storage_path('app/public/images/portfolios'),175,175, null, false),
            'max' => $faker->image(storage_path('app/public/images/portfolios'),816, 282, null, false),
            'path' => $faker->image(storage_path('app/public/images/portfolios'),1100, 618, null, false)
        ]),
        'meta_desc' => $faker->text(20),
        'meta_key' => $faker->text(20)
    ];
});
