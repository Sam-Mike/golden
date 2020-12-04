<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            StatusSeeder::class,
            CompanySeeder::class,
            DepartmentSeeder::class,
            LicenseClassSeeder::class,
            TripClassSeeder::class,
            TruckTypeSeeder::class,
            TrailerTypeSeeder::class,
            CargoTypeSeeder::class,
            LocationSeeder::class,
            RolePositionSeeder::class,
            CargoSeeder::class,
        ]);
         \App\Models\Client::factory(5)->create();
         \App\Models\People::factory(5)->create();
         \App\Models\Truck::factory(5)->create();
         \App\Models\Trailer::factory(5)->create();
        
    }
}
