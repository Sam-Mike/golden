<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_make')->insert(['name' => 'SCANIA']);
        DB::table('vehicle_make')->insert(['name' => 'HOWO']);
        DB::table('vehicle_make')->insert(['name' => 'DAF']);
        DB::table('vehicle_make')->insert(['name' => 'HINO']);
        DB::table('vehicle_make')->insert(['name' => 'TATA']);
        DB::table('vehicle_make')->insert(['name' => 'TOYOTA']);
        DB::table('vehicle_make')->insert(['name' => 'FORD']);
    }
}
