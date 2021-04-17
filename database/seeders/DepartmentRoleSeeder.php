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
        DB::table('department_role')->insert(['name' => 'DRIVER', 'department_id' => 1]);
        DB::table('department_role')->insert(['name' => 'HR-ASS', 'department_id' => 3]);
    }
}
