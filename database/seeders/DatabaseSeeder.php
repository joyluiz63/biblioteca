<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        // \App\Models\Usuario::factory(10)->create();

        // \App\Models\Usuario::factory()->create([
        //     'nome'          => 'Test Usuario',
        //     'nascimento'    => '9999-99-99',
        //     'cpf'           => '',
        //     'rua'           => 'Test Usuario',
        //     'numero'        => 'Test Usuario',
        //     'bairro'        => 'Test Usuario',
        //     'cidade'        => 'Test Usuario',
        //     'fone'          => 'Test Usuario',
        //     'email'         => 'test@example.com',
        // ]);

        $usuario = Usuario::factory()
            ->count(20)
            ->create();
    }
}
