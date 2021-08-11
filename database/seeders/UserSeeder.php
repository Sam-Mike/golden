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
            'name' => 'admin',
            'email' => 'example@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@239'),
            'password_visible' => 'admin@239',
            'role_id' => 1,
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'hr',
            'email' => 'example1@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'password_visible' => '123',
            'role_id' => 2,
            'remember_token' => Str::random(10),
        ]);
    }
}
