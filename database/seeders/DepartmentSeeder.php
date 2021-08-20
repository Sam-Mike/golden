<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert(['name' => 'DIRECTORATE']);
        DB::table('department')->insert(['name' => 'OPERATIONS']);
        DB::table('department')->insert(['name' => 'H.R']);
        DB::table('department')->insert(['name' => 'I.T']);
        DB::table('department')->insert(['name' => 'H.S.E']);
        DB::table('department')->insert(['name' => 'WORKSHOP']);
        DB::table('department')->insert(['name' => 'FINANCE']);
        DB::table('department')->insert(['name' => 'ADMINISTRATION']);
        DB::table('department')->insert(['name' => 'TYRES']);
        DB::table('department')->insert(['name' => 'SECURITY']);
    }
}
