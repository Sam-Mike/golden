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
        DB::table('department_role')->insert(['name' => 'HGV-DRIVER', 'department_id' => 1]);
        DB::table('department_role')->insert(['name' => 'LGV-DRIVER', 'department_id' => 1]);
        DB::table('department_role')->insert(['name' => 'LVD-DRIVER', 'department_id' => 1]);
        DB::table('department_role')->insert(['name' => 'CN-DRIVER', 'department_id' => 1]);
        DB::table('department_role')->insert(['name' => 'CN-ERT-DRIVER', 'department_id' => 1]);
        DB::table('department_role')->insert(['name' => 'HR-MGR', 'department_id' => 3]);
        DB::table('department_role')->insert(['name' => 'HR-OFFICER', 'department_id' => 3]);
        DB::table('department_role')->insert(['name' => 'IT-MGR', 'department_id' => 4]);
        DB::table('department_role')->insert(['name' => 'IT-OFFICER', 'department_id' => 4]);
    }
}
