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
        DB::table('trailer_type')->insert(['name' => 'FLAT-BED']);
        DB::table('trailer_type')->insert(['name' => 'HIGH-SIDE']);
        DB::table('trailer_type')->insert(['name' => 'INTERLINK']);
        DB::table('trailer_type')->insert(['name' => 'GOOSE-NECK']);
        DB::table('trailer_type')->insert(['name' => 'LOW-BED']);
        DB::table('trailer_type')->insert(['name' => 'DANGLER']);
    }
}
