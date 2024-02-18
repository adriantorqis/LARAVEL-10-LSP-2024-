<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the users table
        DB::table('users')->truncate();

        // Insert sample user data
        DB::table('users')->insert([
            'name' => 'admin',
            'nik' => 'admin123',
            'password' => Hash::make('password123'),
        ]);
        DB::table('users')->insert([
            'name' => 'admin2',
            'nik' => 'admin12',
            'password' => Hash::make('password123'),
        ]);


        // Add more users as needed
    }
}
