<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert(['name'=>'GOLDEN COACH']);
        DB::table('company')->insert(['name'=>'GOLDEN FLEET']);
        DB::table('company')->insert(['name'=>'GOLDEN WHEELS']);
    }
}
