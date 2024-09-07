<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Cria um usuário admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'), // Criptografa a senha
            'cpf' => '12345678900',
            'role' => 'admin',
        ]);

        // Cria um usuário professor
        User::create([
            'name' => 'Professor User',
            'email' => 'professor@example.com',
            'password' => Hash::make('123'), // Criptografa a senha
            'cpf' => '09876543211',
            'role' => 'professor',
        ]);
    }
}