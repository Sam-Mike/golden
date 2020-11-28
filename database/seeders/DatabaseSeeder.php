<?php

namespace Database\Seeders;

use App\Models\TruckType;
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
        //\App\Models\User::factory(10)->create()
        $this->call([
            ClusterSeeder::class,
            TruckTypeSeeder::class,
            TrailerTypeSeeder::class,
            LicenseClassSeeder::class,
            StatusSeeder::class,
            CargoTypeSeeder::class,
            LocationSeeder::class,
            DepartmentSeeder::class,
            RolePositionSeeder::class,
            CompanySeeder::class,
            CargoSeeder::class,
        ]);
         \App\Models\Client::factory(5)->create();
         \App\Models\People::factory(5)->create();
         \App\Models\Truck::factory(5)->create();
         \App\Models\Trailer::factory(5)->create();
        
    }
}
