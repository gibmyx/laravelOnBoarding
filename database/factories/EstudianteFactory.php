<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class EstudianteFactory extends Factory
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
        'cedula' => fake()->numberBetween(24000000, 33000000),
        'edad' => fake()->numberBetween(17,25),
        'genero' => fake()->randomElement(['masculino', 'femenino']),
        'grado' => fake()->randomElement(['Grado 1', 'Grado 2', 'Grado 3', 'Grado 4']),
        'cantidad_materia' => fake()->numberBetween(1, 8),
        'nota' => fake()->numberBetween(0, 10),
        ];
    }
}
/*
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
*/