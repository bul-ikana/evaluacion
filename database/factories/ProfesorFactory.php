<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'        => $this->faker->name(),
            'cedula'        => $this->faker->numerify('##########'),
            'contrato'      => $this->faker->numerify('##########-##########'),
            'fecha_inicio'  => $this->faker->dateTimeBetween('-10 year', '-1 year'),
            'foto'          => $this->faker->imageURL(480, 640),
        ];
    }
}
