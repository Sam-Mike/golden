<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(['name' => 'FREE']);
        DB::table('status')->insert(['name' => 'ALLOCATED']);
        DB::table('status')->insert(['name' => 'INACTIVE']);
        DB::table('status')->insert(['name' => 'OFFLOADING']);
    }
}
