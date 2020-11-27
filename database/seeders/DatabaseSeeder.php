<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
         //\App\Models\Client::factory(5)->create();
         //\App\Models\People::factory(20)->create();
         \App\Models\Truck::factory(3)->create();
        
    }
}
