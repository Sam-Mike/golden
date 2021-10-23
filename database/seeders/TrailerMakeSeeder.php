<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrailerMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trailer_make')->insert(['name' => 'SIMBA']);
        DB::table('trailer_make')->insert(['name' => 'RHINO']);
        DB::table('trailer_make')->insert(['name' => 'TURKEY BST']);
        DB::table('trailer_make')->insert(['name' => 'PIACENZA']);
        DB::table('trailer_make')->insert(['name' => 'DOLL']);
        DB::table('trailer_make')->insert(['name' => 'AM TRAILER']);
        DB::table('trailer_make')->insert(['name' => 'UK TRL BOOSTER']);
        DB::table('trailer_make')->insert(['name' => 'OCEN']);
        DB::table('trailer_make')->insert(['name' => 'DANGLER']);
    }
}
