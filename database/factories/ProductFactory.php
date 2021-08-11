<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'brands_id' => 1,
        'categories_id' => 1,
        'name' => $faker->name,
        'slug' => Str::slug($faker->unique()->name),
        'price' => $faker->randomNumber(6),
        'sellprice' => $faker->randomNumber(6),
        'content' => $faker->text,
        'status' => 1,
        'ordernum' => 1,
        'quantily' => 100,
        'tags' => 'tag',
    ];
});
