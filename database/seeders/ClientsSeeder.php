<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clients;


class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clients::factory()
            ->times(50)->create();
    }
}
