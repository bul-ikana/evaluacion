<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Profesor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'profesor_id'       => function () {
                                        if (Profesor::count()) {
                                            return Profesor::all()->random()->id;
                                        } else {
                                            return factory(Profesor::class)->create()->id;
                                        }
                                    },
            'nombre_estudiante' => $this->faker->firstName().' '.$this->faker->lastName(),
            'correo_estudiante' => $this->faker->safeEmail(),
            'calificacion'      => $this->faker->randomDigitNotNull(),
            'comentario'        => $this->faker->paragraph(),
        ];
    }
}
