<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\Seller;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $name = $faker->sentence;
    $status = $faker->randomElement([Post::PUBLISHED, Post::PENDING, Post::EXPIRED]);
    $commune = \App\Commune::all()->random();
    return [
        'seller_id' => Seller::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'name' => $name,
        'slug' => Str::slug($name, '-'),
        'description' => $faker->paragraph,
        'status' => $status,
        'previous_published' => $status !== Post::PUBLISHED ? false : true,
        'price' => $faker->numberBetween(100000, 750000),
        'region_id' => $commune->region_id,
        'commune_id' => $commune->id
    ];
});
