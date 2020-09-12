<?php

use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = factory(App\Models\Order::class, 10)
            ->create()
            ->each(function ($order) {
                $products = factory(App\Models\Product::class, 10)->create();
                $keyProduct = $products->mapWithKeys(function($product){
                    return [$product->id => ['amount' => random_int(1, 100)]];
                });
                $order->products()->attach($keyProduct->toArray());
            });

    }
}
