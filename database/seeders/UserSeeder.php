<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Rodar Todas Seeders de Níveis de Usuários
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'perfis' => ['admin'],
            'password' => Hash::make("123"),
        ]);

        User::create([
            'name' => 'Coordenador User',
            'email' => 'coordenador@email.com',
            'perfis' => ['coordenador'],
            'password' => Hash::make("123"),
        ]);

        User::create([
            'name' => 'Orientador User',
            'email' => 'orientador@email.com',
            'perfis' => ['orientador'],
            'password' => Hash::make("123"),
        ]);
    }
}
