<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

        'nombre' => fake()->name(),
        'apellido' => fake()->lastName(),
        'email' => fake()->email(),
        'descripcion' => fake()->text(20),

        ];
    }
}
