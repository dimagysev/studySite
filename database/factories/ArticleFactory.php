<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'alias' => $faker->slug,
        'text' => $faker->text(500),
        'desc' => $faker->text(200),
        'user_id' => 1,
        'category_id' =>1,
        'img' => json_encode([
            'mini' => $faker->image(storage_path('app/public/images/articles'),55,55, null, false),
            'max' => $faker->image(storage_path('app/public/images/articles'),816, 282,null, false),
            'path' => $faker->image(storage_path('app/public/images/articles'),1100, 618,null, false)
        ]),
        'meta_desc' => $faker->text(20),
        'meta_key' => $faker->text(20)
    ];
});
