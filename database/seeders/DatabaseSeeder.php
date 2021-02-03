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
            ClientSeeder::class,
            PeopleSeeder::class,
            TrailerSeeder::class,
            TruckSeeder::class,
        ]); 
    }
}
