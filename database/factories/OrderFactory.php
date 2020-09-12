<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    //TODO fazer factory com relação many top many
    return [
        'order_status'=>$faker->boolean(),
        'costumer_id'=>factory(App\Models\Costumer::class)
//        'amount'=>$faker->randomNumber("2")
    ];
});
