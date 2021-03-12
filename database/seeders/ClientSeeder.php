<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->insert(['name'=>'Golden Coach', 'activity_status_id' => 1,]);
        DB::table('client')->insert(['name'=>'Golden Fleet', 'activity_status_id' => 1,]);
        DB::table('client')->insert(['name'=>'Golden Wheels', 'activity_status_id' => 1,]);
        \App\Models\Client::factory(8)->create();
    }
}
