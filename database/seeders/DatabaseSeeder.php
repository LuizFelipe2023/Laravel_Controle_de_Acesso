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
        User::create([
            'nome' => 'Admin User',
            'cpf' => '12345678901',
            'funcao' => 'Administrador',
            'turno' => 'Diurno',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'tipo' => 'admin'
        ]);

        User::create([
            'nome' => 'Regular User',
            'cpf' => '98765432109',
            'funcao' => 'Funcionário',
            'turno' => 'Noturno',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'tipo' => 'comum'
        ]);
    }
}
