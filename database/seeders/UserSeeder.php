<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'samike',
            'password' => Hash::make('admin@239'),
            'password_visible' => 'admin@239',
            'role_id' => 1,
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'hr',
            'password' => Hash::make('goldenhr@2021'),
            'password_visible' => 'goldenhr@2021',
            'role_id' => 2,
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'operations',
            'password' => Hash::make('operations@gc'),
            'password_visible' => 'operations@gc',
            'role_id' => 3,
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'finance',
            'password' => Hash::make('finance@gcfw'),
            'password_visible' => 'finance@gcfw',
            'role_id' => 4,
            'remember_token' => Str::random(10),
        ]);
    }
}
