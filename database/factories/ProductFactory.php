<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'                  => $faker->name,
        'slug'                  => Str::slug($faker->unique()->name),
        'price'                 => $faker->randomNumber(6),
        'sellprice'             => $faker->randomNumber(6),
        'quantily'              => 100,
        'description'           => $faker->text,
        'status'                => 1,
    ];
});
