<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Perpustakaan',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::query()->updateOrCreate(
            ['email' => 'petugas@example.com'],
            [
                'name' => 'Petugas Perpustakaan',
                'password' => Hash::make('password123'),
                'role' => 'petugas',
            ]
        );
    }
}
