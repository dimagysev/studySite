<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName . ' '. $faker->lastName,
        'email' => $faker->email,
        'login' => $faker->userName,
        'password' => bcrypt('123321123')
    ];
});
