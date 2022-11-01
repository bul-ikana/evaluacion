<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Profesor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'profesor_id' => Profesor::all()->random()->id,
            'materia_id' => Materia::all()->random()->id,
            'turno' => $this->faker->randomElement(['matutino', 'vespertino']),
        ];
    }
}
