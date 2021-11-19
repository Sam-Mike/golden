<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HazardClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hazard_class')->insert(['name'=> 'HAZARDOUS']);
        DB::table('hazard_class')->insert(['name'=> 'NON-HAZARDOUS']);
    }
}
