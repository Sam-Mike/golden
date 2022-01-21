<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo')->insert(['name' => 'SAND', 'cargo_type_id' => 1, 'hazard_class_id'=>1]);
        DB::table('cargo')->insert(['name' => 'WHEAT', 'cargo_type_id' => 1, 'hazard_class_id'=>2]);
    }
}
