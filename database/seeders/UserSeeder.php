<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('11111111'),
            'role' => 1,
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('11111111'),
            'role' => 2,
        ]);
    }
}
