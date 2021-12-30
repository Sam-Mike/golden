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
            VehicleTypeSeeder::class,
            FuelTypeSeeder::class,
            VehicleMakeSeeder::class,
            VehicleTransmissionTypeSeeder::class,
            TrailerTypeSeeder::class,
            TrailerMakeSeeder::class,
            CargoTypeSeeder::class,
            HazardClassSeeder::class,
            DepartmentRoleSeeder::class,
            ClaimTypeSeeder::class,
            RoleSeeder::class,
            CurrencySeeder::class,
            ExpenseCategorySeeder::class,
            ExpenseSubCategorySeeder::class,
            // DestinationSeeder::class,
            UserSeeder::class,
            // ClientSeeder::class,
        ]); 
    }
}
