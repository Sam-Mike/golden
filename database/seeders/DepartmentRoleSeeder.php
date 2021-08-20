<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //directorate
        DB::table('department_role')->insert(['name' => 'DIRECTOR', 'department_id' => 1]);
        //operations roles
        DB::table('department_role')->insert(['name' => 'HEAD-OPERATIONS', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'OPERATIONS-SUPERVISOR', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'FLEET-SUPERVISOR', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'HGV-DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'LGV-DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'LVD-DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'CN-DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'CN-ERT-DRIVER', 'department_id' => 2]);
        //hr and administrations roles
        DB::table('department_role')->insert(['name' => 'HR-MGR', 'department_id' => 3]);
        DB::table('department_role')->insert(['name' => 'HR-OFFICER', 'department_id' => 3]);
        //IT roles
        DB::table('department_role')->insert(['name' => 'IT-MGR', 'department_id' => 4]);
        DB::table('department_role')->insert(['name' => 'IT-OFFICER', 'department_id' => 4]);
        //H.S.E roles
        DB::table('department_role')->insert(['name' => 'H.S.E-MGR', 'department_id' => 5]);
        DB::table('department_role')->insert(['name' => 'H.S.E-ASSISTANT', 'department_id' => 5]);
        //workshop roles dept6
        DB::table('department_role')->insert(['name' => 'WORKSHOP-MANAGER', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'WORKSHOP-SUPERVISOR', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'WORKSHOP-MANAGER', 'department_id' => 6]);

    }
}
