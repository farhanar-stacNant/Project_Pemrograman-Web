<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'status' => 'active',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'status' => 'active',
            'role' => 'staff',
            'password' => bcrypt('password')
        ]);
    }
}
