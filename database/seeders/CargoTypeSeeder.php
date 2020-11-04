<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo_type')->insert(['name' => 'NON-HAZARDOUS CARGO']);
        DB::table('cargo_type')->insert(['name' => 'ACTIVATED CARBON']);
        DB::table('cargo_type')->insert(['name' => 'BULK CEMENT']);
        DB::table('cargo_type')->insert(['name' => 'SODIUM CYANIDE']);
        DB::table('cargo_type')->insert(['name' => 'AMMONIUM NITRATE']);
        DB::table('cargo_type')->insert(['name' => 'HCL']);
        DB::table('cargo_type')->insert(['name' => 'LOOSE CARGO']);
        DB::table('cargo_type')->insert(['name' => 'PIPES']);
    }
}
