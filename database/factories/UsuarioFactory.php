<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'          => fake()->name(),
            'nascimento'    => fake()->date(),
            // 'cpf'           => fake()->cpf(),
            'rua'           => fake()->name(),
            'numero'        => fake()->numberBetween(0,1000),
            'bairro'        => fake()->name(),
            'cidade'        => fake()->name(),
            'fone'          => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
