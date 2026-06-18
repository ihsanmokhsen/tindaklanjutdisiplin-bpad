<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Default admin account - login menggunakan username (NIP) dan password
        User::firstOrCreate(
            ['username' => 'admin_bpad'],
            [
                'name'              => 'Administrator BPAD NTT',
                'email'             => 'admin@bpad.ntt.go.id',
                'username'          => 'admin_bpad',
                'password'          => Hash::make('Admin@BPAD2025'),
                'email_verified_at' => now(),
            ]
        );
    }
}
