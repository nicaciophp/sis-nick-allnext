<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'amount' => $faker->randomNumber("2"),
        'photo' => $faker->imageUrl(),
        'value' => $faker->randomFloat("2", 0, 10000),
        'category_id' => factory(App\Models\Category::class)
    ];
});
