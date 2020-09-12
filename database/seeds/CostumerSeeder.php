<?php

use Illuminate\Database\Seeder;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Models\Costumer::class, 300)->create();
    }
}
