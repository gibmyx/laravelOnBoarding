<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class ProfesorFactory extends Factory
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
        'cedula' => fake()->numberBetween(10000000, 22000000),
        'edad' => fake()->numberBetween(17,25),
        'genero' => fake()->randomElement(['masculino', 'femenino']),
        'titulo_universitario' => fake()->randomElement(['Licenciado', 'Ingeniero']),
        'materia_asignada' => fake()->word(),
        'horas_asignadas' => fake()->numberBetween(0, 10),
        ];
    }
}
