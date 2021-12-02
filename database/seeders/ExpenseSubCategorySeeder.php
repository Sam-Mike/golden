<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*1 md house*/
        DB::table('expense_subcategory')->insert(['name' => 'CLEANING (SWIMMING POOL/CARS/OTHER)', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'NEWSPAPER', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'CELL CARDS(SAFIA/MADAM/OTHERS)', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'SEA VIEW (GARBAGE/LUKU/OTHERS)', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'SEA VIEW (GARBAGE/LUKU/OTHERS)', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'NHC HOUSE MOROGORO ROAD', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'PETROL', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'DAWASCO', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'GENERAL SUNDRIES (EGGS/TISSUE/OTHERS)', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'BONUS', 'expense_category_id' => 1]);
        DB::table('expense_subcategory')->insert(['name' => 'BAGAMOYO PLOT', 'expense_category_id' => 1]);

        /*2 STAFF SALARY*/
        DB::table('expense_subcategory')->insert(['name' => 'LEAVE PAID/LEAVE SALLARY/ ANNUAL LEAVE ALLOWANCE', 'expense_category_id' => 2]);
        DB::table('expense_subcategory')->insert(['name' => 'DAILY WAGES', 'expense_category_id' => 2]);
        DB::table('expense_subcategory')->insert(['name' => 'TERMINAL BENEFITS', 'expense_category_id' => 2]);
        DB::table('expense_subcategory')->insert(['name' => 'OVERTIME', 'expense_category_id' => 2]);
        DB::table('expense_subcategory')->insert(['name' => 'MONTHLY W.C.F', 'expense_category_id' => 2]);
        DB::table('expense_subcategory')->insert(['name' => 'SALARY', 'expense_category_id' => 2]);
        DB::table('expense_subcategory')->insert(['name' => 'LEAVE MD HOUSE', 'expense_category_id' => 2]);
        DB::table('expense_subcategory')->insert(['name' => 'NSSF/ PAYE/ SDL MD HOUSE', 'expense_category_id' => 2]);
        DB::table('expense_subcategory')->insert(['name' => 'BURIAL FACILITATION', 'expense_category_id' => 2]);
        
        DB::table('expense_subcategory')->insert(['name' => 'ACCIDENT & B/DOWN(SUPERVISION/REPAIR/SRCURITY/TOWING)', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'ALTERATION', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'LOADING/OFFLOADING(COPPER/REARRANGE CARGO)', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'GENERAL MAINTENANCE(PASSPORT/SECURITY/PARKING/LASHING/TRAFFIC/TRUCK WATHING)', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'TRANSPORT/PARCEL CHARGE', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'EXPLOSIVE STICKER/ OTHER STICKERS', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'INCIDENDAL (PORT/POLICE/TANROAD/IMMIGRATION/TRANSIT)', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'PERMIT(CHANGE LOADING PERMIT/DRIVER NAME/DOCUMENTS/CUSTOM CITY COUNCIL)', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'BORDER DELAY FINE (TUNDUMA-KABANGA/OTHERS)', 'expense_category_id' => 3]);
        DB::table('expense_subcategory')->insert(['name' => 'TO WRITE TL NUMBER/ADDRESS/ TRANSIT GOODS', 'expense_category_id' => 3]);

        DB::table('expense_subcategory')->insert(['name' => 'CERTIFIED & TRUE COPY', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'SUMATRA', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'TRA STICKER', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'CARRIER LICENSE', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'SAFETY STICKER', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'VEHICLE INSPECTION', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'C-28/ C-40: LICENSE & APPLICATION', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'INSURANCE', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'COMESA', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'OTHERS', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'CANCELATION C28', 'expense_category_id' => 4]);
        DB::table('expense_subcategory')->insert(['name' => 'GCLA- TRANSIT PERMIT', 'expense_category_id' => 4]);

        DB::table('expense_subcategory')->insert(['name' => 'LOCAL DIESEL -BANK/CASH', 'expense_category_id' => 5]);
        DB::table('expense_subcategory')->insert(['name' => 'TRANSIT DIESEL -BANK/CASH', 'expense_category_id' => 5]);

        DB::table('expense_subcategory')->insert(['name' => 'PETROL', 'expense_category_id' => 6]);
        DB::table('expense_subcategory')->insert(['name' => 'DIESEL', 'expense_category_id' => 6]);

        DB::table('expense_subcategory')->insert(['name' => 'STAFF LUNCH/OTHERS', 'expense_category_id' => 7]);
        DB::table('expense_subcategory')->insert(['name' => 'LOCAL ALLOWANCE', 'expense_category_id' => 7]);

        DB::table('expense_subcategory')->insert(['name' => 'OFFLOAD CONTAINER FFT', 'expense_category_id' => 8]);
        DB::table('expense_subcategory')->insert(['name' => 'OTHERS', 'expense_category_id' => 8]);

        DB::table('expense_subcategory')->insert(['name' => 'INCIDENTAL', 'expense_category_id' => 9]);
        DB::table('expense_subcategory')->insert(['name' => 'INCIDENTAL OTHERS', 'expense_category_id' => 9]);

        DB::table('expense_subcategory')->insert(['name' => 'FRIDAY FEAST', 'expense_category_id' => 10]);
        DB::table('expense_subcategory')->insert(['name' => 'WEEKLY SADQA', 'expense_category_id' => 10]);
        DB::table('expense_subcategory')->insert(['name' => 'SADQA GOATS', 'expense_category_id' => 10]);

        DB::table('expense_subcategory')->insert(['name' => 'LUKU', 'expense_category_id' => 11]);
        DB::table('expense_subcategory')->insert(['name' => 'SALARY', 'expense_category_id' => 11]);
        DB::table('expense_subcategory')->insert(['name' => 'CLEANING MATERIALS', 'expense_category_id' => 11]);
        DB::table('expense_subcategory')->insert(['name' => 'OTHERS', 'expense_category_id' => 11]);

        DB::table('expense_subcategory')->insert(['name' => 'BONUS LOCAL/TRANSIT', 'expense_category_id' => 12]);

        DB::table('expense_subcategory')->insert(['name' => 'SINGIDA CHECKLIST', 'expense_category_id' => 13]);
        DB::table('expense_subcategory')->insert(['name' => 'DODOMA CHECKLIST', 'expense_category_id' => 13]);
        DB::table('expense_subcategory')->insert(['name' => 'OTHERS PATROLING', 'expense_category_id' => 13]);

        DB::table('expense_subcategory')->insert(['name' => 'ALLOWANCE & EXP- LOCAL', 'expense_category_id' => 14]);
        DB::table('expense_subcategory')->insert(['name' => 'ALLOWANCE & EXP- TRANSIT', 'expense_category_id' => 14]);
        DB::table('expense_subcategory')->insert(['name' => 'ALLOWANCE & EXP- ESCORT/ CONVOY', 'expense_category_id' => 14]);
        DB::table('expense_subcategory')->insert(['name' => 'SADQA - LOCAL', 'expense_category_id' => 14]);
        DB::table('expense_subcategory')->insert(['name' => 'SADQA - TRANSIT', 'expense_category_id' => 14]);

        DB::table('expense_subcategory')->insert(['name' => 'ALLOWANCE GENERAL', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'HEALTH CERTIFICATE/ FIRE TRAINING', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'LPG GAS, ORYX GAS', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'PLUMBING MATERIALS FOR FIRE TANK', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'M/S PLATE - BENDING/CUTTING/OTHERS', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'PAINT GOODS & SIKENS', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'CHAIN HIRING/ SPANNER/ FORK LIFT/ CRANE', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'PETROL - FIRE TRAINING/ OTHERS', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'SAW DUST', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'SPANNER & TOOLS', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'TYRE BAY MATERIALS', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'WHITE CHALK', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'WELDING MACHINE & SPARES', 'expense_category_id' => 15]);
        DB::table('expense_subcategory')->insert(['name' => 'FIRST AID & HSE MATERIALS', 'expense_category_id' => 15]);

        DB::table('expense_subcategory')->insert(['name' => 'BUS FARE & TAXI', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'CELL CARD - (BOSS/ALI/STAFF)', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'COMPUTER PHOTOCOPY ACCESSORIES(TONNER, CARTRIDGE, GENERAL REPAIR)', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'DIESEL TANK', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'POSTAL/ PARCEL CHARGE(M-PESA/DHL/OTHERS)', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'ELECTRIC MATERIALS & LABOR EXPENSES', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'EXTREME WEB TEC', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'GARDEN - FLOWER PLANT & MEDICINE', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'LUKU - (OFFICE/WORKSHOP/GARAGE/MBAGALA)', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'GCLA & OTHER TRAINING EXPENSES', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => "CHANG'OMBE EXPENSES", 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'MEDICAL EXPENSES', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'MBAGALA EXPENSES', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'GENERAL SUNDRIES(WATER/OFFICE CLEANING/MILK/SOFT DRINK/MADAFU)', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'DOCUMENT ENDORSEMENT (PASSPORT/OTHERS)', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'PLUMBING MATERIALS & LABOR EXPENSES', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'RENT FOR TUNDUMA HOUSE', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'STATIONERY', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'SUNGU SUNGU', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'PROFESSIONAL CHARGES', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'GOLDEN HEIGHTS', 'expense_category_id' => 16]);
        DB::table('expense_subcategory')->insert(['name' => 'DIESEL TRANSPORTATION EXP', 'expense_category_id' => 16]);


    }
}
