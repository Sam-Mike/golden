<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trip_class')->insert(['name' => 'LOCAL']);
        DB::table('trip_class')->insert(['name' => 'TRANSIT']);
    }
}
