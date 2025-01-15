<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'), // Use a secure password
            'is_admin' => 1, // Assuming you have a 'role' field
        ]);

        User::create([
            'name' => 'Tes',
            'email' => 'tes@gmail.com',
            'password' => Hash::make('tes'), // Use a secure password
            'is_admin' => 0, // Assuming you have a 'role' field
        ]);
    }
}
