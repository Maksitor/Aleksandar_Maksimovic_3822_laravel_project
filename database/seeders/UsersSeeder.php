<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Aleksandar',
            'email' => 'superadmin@chocolate.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petar',
            'email' => 'petar@test.rs',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}