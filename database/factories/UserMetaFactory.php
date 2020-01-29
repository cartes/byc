<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserMeta;
use Faker\Generator as Faker;

$factory->define(UserMeta::class, function (Faker $faker) {
    $commune = \App\Commune::all()->random();

    return [
        'user_id' => \App\User::all()->random()->id,
        'rut' => null,
        'gender' => $faker->randomElement([1, 2, 3]),
        'address' => $faker->address,
        'region_id' => $commune->region_id,
        'commune_id' => $commune->id,
        'city' => null,
        'province' => null,
        'birthday' => null
    ];
});
