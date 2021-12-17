<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_category')->insert(['name'=>'MD HOUSE EXP']);
        DB::table('expense_category')->insert(['name'=>'STAFF SALARY & LEAVE/OTHERS']);
        DB::table('expense_category')->insert(['name'=>'VEHICLE SERVICE & MAINTENANCE']);
        DB::table('expense_category')->insert(['name'=>'LICENSE']);
        DB::table('expense_category')->insert(['name'=>'DIESEL & LUBRICANTS']);
        DB::table('expense_category')->insert(['name'=>'PETROL & EXP']);
        DB::table('expense_category')->insert(['name'=>'STAFF WELFARE']);
        DB::table('expense_category')->insert(['name'=>'SUSPENSE ACCOUNT']);
        DB::table('expense_category')->insert(['name'=>'INCIDENTAL']);
        DB::table('expense_category')->insert(['name'=>'SADQA EXPENSE']);
        DB::table('expense_category')->insert(['name'=>'MASJID']);
        DB::table('expense_category')->insert(['name'=>'RETURN BONUS']);
        DB::table('expense_category')->insert(['name'=>'MONTHLY CHECK LIST']);
        DB::table('expense_category')->insert(['name'=>'TRIP ALLOWANCE & EXPP']);
        DB::table('expense_category')->insert(['name'=>'GARAGE VEHICLES MAINTENANCE']);
        DB::table('expense_category')->insert(['name'=>'OFFICE & GARAGE MAINTENANCE']);
    }
}
