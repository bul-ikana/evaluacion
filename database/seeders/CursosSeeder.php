<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Profesor;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Materia::count() === 0) {
            Materia::factory()->create([
                "nombre" => 'Economía'
            ]);

            Materia::factory()->create([
                "nombre" => 'Contabilidad'
            ]);

            Materia::factory()->create([
                "nombre" => 'Estadística'
            ]);

            Materia::factory()->create([
                "nombre" => 'Microeconomía'
            ]);

            Materia::factory()->create([
                "nombre" => 'Econometría'
            ]);
        }

        if (Curso::count() === 0) {
            Curso::factory()->count(15)->create();
        }
    }
}
