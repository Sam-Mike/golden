<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AllocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Allocation::factory(100)->create();
    }
}
