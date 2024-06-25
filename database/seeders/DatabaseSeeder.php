<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2024-06-22 11:30:08',
            'password' => Hash::make('adminskh'), // Anda dapat menggunakan Hash untuk mengenkripsi password
        ]);
    }
}