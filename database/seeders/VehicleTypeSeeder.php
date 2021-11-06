<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_type')->insert(['name' => 'SEMI']);
        DB::table('vehicle_type')->insert(['name' => '10 TON']);
        DB::table('vehicle_type')->insert(['name' => '3 TON']);
        DB::table('vehicle_type')->insert(['name' => '1 TON']);
        DB::table('vehicle_type')->insert(['name' => 'LIGHT']);
    }
}
