<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Slider::class, function (Faker $faker) {
    $textPosition = ['left', 'right', 'none'];
    return [
        'title' => '<h2 style="color: #fff3e8">' . \Illuminate\Support\Str::upper($faker->sentence(3)) . '</h2>',
        'img' => $faker->image(storage_path('app/public/images/sliders'),1400, 680, null, false),
        'desc' => $faker->text(50),
        'text_position' => $textPosition[random_int(0,2)]
    ];
});
