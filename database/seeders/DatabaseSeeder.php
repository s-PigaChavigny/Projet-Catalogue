<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ([
            ['name' => 'Utilisateur Demo', 'email' => 'user@example.com', 'access_level' => 'user'],
            ['name' => 'Artiste Demo', 'email' => 'artist@example.com', 'access_level' => 'artist'],
            ['name' => 'Administrateur Demo', 'email' => 'admin@example.com', 'access_level' => 'admin'],
        ] as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                [
                    'name' => $account['name'],
                    'access_level' => $account['access_level'],
                    'password' => 'mot-de-passe',
                    'email_verified_at' => now(),
                ],
            );
        }
    }
}
