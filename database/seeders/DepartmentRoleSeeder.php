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
        /*2*/
        DB::table('department_role')->insert(['name' => 'HEAD-OPERATIONS', 'department_id' => 2]);
        /*3*/
        DB::table('department_role')->insert(['name' => 'OPERATIONS-SUPERVISOR', 'department_id' => 2]);
        /*4*/
        DB::table('department_role')->insert(['name' => 'LOGISTICS-ASSISTANT', 'department_id' => 2]);
        /*5*/
        DB::table('department_role')->insert(['name' => 'FLEET-SUPERVISOR', 'department_id' => 2]);
        /*6*/
        DB::table('department_role')->insert(['name' => 'CASHIER', 'department_id' => 2]);
        /*7*/
        DB::table('department_role')->insert(['name' => 'DRIVER', 'department_id' => 2]);
        /*8*/
        DB::table('department_role')->insert(['name' => 'HGV-DRIVER', 'department_id' => 2]);
        /*9*/
        DB::table('department_role')->insert(['name' => 'LGV-DRIVER', 'department_id' => 2]);
        /*10*/
        DB::table('department_role')->insert(['name' => 'LVD-DRIVER', 'department_id' => 2]);
        /*11*/
        DB::table('department_role')->insert(['name' => 'CN-DRIVER', 'department_id' => 2]);
        /*12*/
        DB::table('department_role')->insert(['name' => 'CN-ERT-DRIVER', 'department_id' => 2]);

        //H.R roles DEPT 3
        /*13*/
        DB::table('department_role')->insert(['name' => 'HR-MGR', 'department_id' => 3]);
        /*14*/
        DB::table('department_role')->insert(['name' => 'HR-ASSISTANT', 'department_id' => 3]);
        /*15*/
        DB::table('department_role')->insert(['name' => 'HR-OFFICER', 'department_id' => 3]);
        //I.T roles
        /*16*/
        DB::table('department_role')->insert(['name' => 'IT-MGR', 'department_id' => 4]);
        /*17*/
        DB::table('department_role')->insert(['name' => 'IT-OFFICER', 'department_id' => 4]);
        /*18*/
        DB::table('department_role')->insert(['name' => 'FLEET TRACKING-OFFICER', 'department_id' => 4]);
        //H.S.E roles
        /*19*/
        DB::table('department_role')->insert(['name' => 'H.S.E-MGR', 'department_id' => 5]);
        /*20*/
        DB::table('department_role')->insert(['name' => 'H.S.E-ASSISTANT', 'department_id' => 5]);

        //WORKSHOP roles dept 6
        /*21*/
        DB::table('department_role')->insert(['name' => 'WORKSHOP-MANAGER', 'department_id' => 6]);
        /*22*/
        DB::table('department_role')->insert(['name' => 'WORKSHOP-SUPERVISOR', 'department_id' => 6]);
        /*23*/
        DB::table('department_role')->insert(['name' => 'WORKSHOP-MANAGER', 'department_id' => 6]);
        /*24*/
        DB::table('department_role')->insert(['name' => 'STORE-MANAGER', 'department_id' => 6]);
        /*25*/
        DB::table('department_role')->insert(['name' => 'STORE-ASSISTANT', 'department_id' => 6]);
        /*26*/
        DB::table('department_role')->insert(['name' => 'PURCHASING-OFFICER', 'department_id' => 6]);
        /*27*/
        DB::table('department_role')->insert(['name' => 'MECHANIC', 'department_id' => 6]);
        /*28*/
        DB::table('department_role')->insert(['name' => 'MOTOR-MECHANIC', 'department_id' => 6]);
        /*29*/
        DB::table('department_role')->insert(['name' => 'TRAILER-MECHANIC', 'department_id' => 6]);
        /*30*/
        DB::table('department_role')->insert(['name' => 'HYDRAULIC-MECHANIC', 'department_id' => 6]);
        /*31*/
        DB::table('department_role')->insert(['name' => 'HELPER-TYRES', 'department_id' => 6]);
        /*32*/
        DB::table('department_role')->insert(['name' => 'WHEEL ALIGNMENT-TYRES', 'department_id' => 6]);
        /*33*/
        DB::table('department_role')->insert(['name' => 'AIR SYSTEM-MECHANIC', 'department_id' => 6]);
        /*34*/
        DB::table('department_role')->insert(['name' => 'AUMOTOTIVE-ELECTRICIAN', 'department_id' => 6]);
        /*35*/
        DB::table('department_role')->insert(['name' => 'GREASER', 'department_id' => 6]);
        /*36*/
        DB::table('department_role')->insert(['name' => 'WELDER', 'department_id' => 6]);
        /*37*/
        DB::table('department_role')->insert(['name' => 'PAINTER', 'department_id' => 6]);
        /*38*/
        DB::table('department_role')->insert(['name' => 'FUEL MAN', 'department_id' => 6]);

        //ADMINISTRATION roles dept 8
        /*39*/
        DB::table('department_role')->insert(['name' => 'P.A-SECRETARY', 'department_id' => 8]);
        /*40*/
        DB::table('department_role')->insert(['name' => 'RECEPTIONIST', 'department_id' => 8]);
        /*41*/
        DB::table('department_role')->insert(['name' => 'CLERK', 'department_id' => 8]);
        /*42*/
        DB::table('department_role')->insert(['name' => 'CLEANER', 'department_id' => 8]);
        /*43*/
        DB::table('department_role')->insert(['name' => 'GARDENER', 'department_id' => 8]);

        //SECURITY roles dept 9
        /*44*/
        DB::table('department_role')->insert(['name' => 'SECURITY-GUARD', 'department_id' => 9]);
        
        //additional workshop roles
        /*45*/
        DB::table('department_role')->insert(['name' => 'TECH-MANAGER', 'department_id' => 6]);
    }
}
