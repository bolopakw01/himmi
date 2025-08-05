<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@himmi.com')->first();

        if (!$admin) {
            User::create([
                'name' => 'Admin HIMMI',
                'email' => 'admin@himmi.com',
                'password' => Hash::make('bolopakw01'),
            ]);
        }
    }
}