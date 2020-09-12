<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Costumer;
use Faker\Generator as Faker;

$factory->define(Costumer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'telephone'=>$faker->phoneNumber,
        'cpf'=>$faker->phoneNumber,
        'email'=>$faker->email
    ];
});
