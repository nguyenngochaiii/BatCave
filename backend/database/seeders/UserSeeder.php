<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'account_id' => 'admin',
            'email' => 'Administrator@gmail.com',
            'password' =>Hash::make('a12345'),
            'state' => 1,
            'level' => 3,
        ]);
    }
}
