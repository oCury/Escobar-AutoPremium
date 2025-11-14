<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Cria o usuário Administrador
        User::create([
            'name' => 'Admin',
            'email' => 'admin@autopremium.com',
            'password' => Hash::make('Admin12345'),
            'role' => 'admin',
        ]);

        // Cria o usuário comum (antigo "guest")
        User::create([
            'name' => 'Escobar',
            'email' => 'escobar@autopremium.com',
            'password' => Hash::make('Escobar12345'),
            'role' => 'user', // O papel padrão
        ]);
    }
}