<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo_type')->insert(['name' => 'BREAK-BULK (LOOSE)']);
        DB::table('cargo_type')->insert(['name' => 'CONTAINERIZED (20FT)']);
        DB::table('cargo_type')->insert(['name' => 'CONTAINERIZED (40FT)']);
    }
}
