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
        DB::table('client')->insert(['name'=>'AURA SYNERGIES', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'BLUE GORILLACORPORATION LIMITED', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'BRAVO LOGISTICS (T) LTD', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'BRIDGE SHIPPING ADO C. STEINWEG BRIDGE (PTY) LTD', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'ETG LOGISTICS LTD', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'FREIGHT FORWARDERS (T) LTD', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'GLOBAL DISTRIBUTORS LTD', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'HONEST LOGISTICS LIMITED', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'MINOLACS', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'MOUNT MERU MILLERS LTD', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'RELOAD LOGISTICS DMCC', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'SIMBA LOGISTICS LTD', 'activity_status_id'=>1]);
        DB::table('client')->insert(['name'=>'SUNSEED COMPLEX', 'activity_status_id'=>1]);
    }
}
