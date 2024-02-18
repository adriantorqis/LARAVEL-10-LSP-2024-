<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

        // Insert dummy user data
        User::create([
            'name' => 'admin',
            'nik' => '123',
            'password' => Hash::make('password123'),
        ]);

        // Add more users as needed
    }
}
