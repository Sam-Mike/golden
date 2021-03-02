<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaimTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('claim_type')->insert(['name'=>'TRUCK']);
        DB::table('claim_type')->insert(['name'=>'TRAILER']);
        DB::table('claim_type')->insert(['name'=>'GOODS']);
        DB::table('claim_type')->insert(['name'=>'FIDELITY']);
    }
}
