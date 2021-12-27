<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destination')->insert(['name' => 'GEITA']);
        DB::table('destination')->insert(['name' => 'NORTH MARA']);
    }
}
