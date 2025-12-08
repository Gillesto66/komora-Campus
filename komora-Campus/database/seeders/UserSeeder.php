<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Début du seeding des utilisateurs');

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('pass'),
                'role' => 'admin',
                'phone' => '690000000',
                'is_subscribed' => true,
            ],
            [
                'name' => 'Utilisateur Test',
                'email' => 'user@test.com',
                'password' => Hash::make('pass'),
                'role' => 'user',
                'phone' => '691234567',
            ],
            [
                'name' => 'Affilié Test',
                'email' => 'affiliate@test.com',
                'password' => Hash::make('pass'),
                'role' => 'affiliate',
                'phone' => '699876543',
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        Log::info('3 utilisateurs créés avec succès (admin, user, affiliate) - mot de passe : "pass"');
    }
}