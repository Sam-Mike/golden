<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrailerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trailer_type')->insert(['name' => 'FLAT BED', 'size'=>'12']);
        DB::table('trailer_type')->insert(['name' => 'HIGH SIDE', 'size'=>'12']);
        DB::table('trailer_type')->insert(['name' => 'EXTENDABLE', 'size'=>'12']);
        DB::table('trailer_type')->insert(['name' => 'EXTENDABLE', 'size'=>'12']);
    }
}
