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
        //NOTE:ALL NEW ROLES ARE ADDED AT THE BOTTOM REGARDLESS OF THE DEPARTMENTS
        //DIRECTORATE roles DEPT 1
        DB::table('department_role')->insert(['name' => 'DIRECTOR', 'department_id' => 1]);
        //OPERATIONS roles DEPT 2
        DB::table('department_role')->insert(['name' => 'HEAD-OPERATIONS', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'OPERATIONS-SUPERVISOR', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'LOGISTICS-ASSISTANT', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'FLEET-SUPERVISOR', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'CASHIER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'HGV-DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'LGV-DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'LVD-DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'CN-DRIVER', 'department_id' => 2]);
        DB::table('department_role')->insert(['name' => 'CN-ERT-DRIVER', 'department_id' => 2]);
        //H.R roles DEPT 3
        DB::table('department_role')->insert(['name' => 'HR-MGR', 'department_id' => 3]);
        DB::table('department_role')->insert(['name' => 'HR-ASSISTANT', 'department_id' => 3]);
        DB::table('department_role')->insert(['name' => 'HR-OFFICER', 'department_id' => 3]);
        //I.T roles
        DB::table('department_role')->insert(['name' => 'IT-MGR', 'department_id' => 4]);
        DB::table('department_role')->insert(['name' => 'IT-OFFICER', 'department_id' => 4]);
        DB::table('department_role')->insert(['name' => 'FLEET TRACKING-OFFICER', 'department_id' => 4]);
        //H.S.E roles
        DB::table('department_role')->insert(['name' => 'H.S.E-MGR', 'department_id' => 5]);
        DB::table('department_role')->insert(['name' => 'H.S.E-ASSISTANT', 'department_id' => 5]);
        //WORKSHOP roles dept 6
        DB::table('department_role')->insert(['name' => 'WORKSHOP-MANAGER', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'WORKSHOP-SUPERVISOR', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'WORKSHOP-MANAGER', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'STORE-MANAGER', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'STORE-ASSISTANT', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'PURCHASING-OFFICER', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'MECHANIC', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'MOTOR-MECHANIC', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'TRAILER-MECHANIC', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'HYDRAULIC-MECHANIC', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'HELPER-TYRES', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'WHEEL ALIGNMENT-TYRES', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'AIR SYSTEM-MECHANIC', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'AUMOTOTIVE-ELECTRICIAN', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'GREASER', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'WELDER', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'PAINTER', 'department_id' => 6]);
        DB::table('department_role')->insert(['name' => 'FUEL MAN', 'department_id' => 6]);
        //ADMINISTRATION roles dept 8
        DB::table('department_role')->insert(['name' => 'P.A-SECRETARY', 'department_id' => 8]);
        DB::table('department_role')->insert(['name' => 'RECEPTIONIST', 'department_id' => 8]);
        DB::table('department_role')->insert(['name' => 'CLERK', 'department_id' => 8]);
        DB::table('department_role')->insert(['name' => 'CLEANER', 'department_id' => 8]);
        DB::table('department_role')->insert(['name' => 'GARDENER', 'department_id' => 8]);
        //SECURITY roles dept 9
        DB::table('department_role')->insert(['name' => 'SECURITY-GUARD', 'department_id' => 9]);
        //additional workshop roles
        DB::table('department_role')->insert(['name' => 'TECH-MANAGER', 'department_id' => 6]);
        

    }
}
