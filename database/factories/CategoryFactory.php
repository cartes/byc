<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->randomElement(['Inmobiliaria', 'Automóviles', 'Servicios']);
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'description' => $faker->sentence
    ];
});
