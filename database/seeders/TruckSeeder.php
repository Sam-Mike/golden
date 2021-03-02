<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Truck::factory(10)->create();
    }
}
