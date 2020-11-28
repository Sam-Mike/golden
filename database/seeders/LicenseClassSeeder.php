<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicenseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('license_class')->insert(['name'=>'A']);
        DB::table('license_class')->insert(['name'=>'B']);
        DB::table('license_class')->insert(['name'=>'C']);
        DB::table('license_class')->insert(['name'=>'D']);
        DB::table('license_class')->insert(['name'=>'E']);
    }
}
