<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::firstOrCreate([
            'username' => 'admin',
            'email' => '',
            'password' => Hash::make('JLFoxAccess2026'),
            'rol_id' => 1 
        ]);
    }
}
