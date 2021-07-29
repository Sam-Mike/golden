<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuel_type')->insert(['name'=>'DIESEL']);
        DB::table('fuel_type')->insert(['name'=>'GASOLINE']);
    }
}
