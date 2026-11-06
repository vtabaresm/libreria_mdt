<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Usuario administrador: puede crear, editar y eliminar
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@libreria.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        //Usuario de consulta: solo puede ver los listados
        User::create([
            'name' => 'Lector',
            'email' => 'reader@libreria.com',
            'password' => Hash::make('password'),
            'role' => 'reader',
        ]);
    }
}
