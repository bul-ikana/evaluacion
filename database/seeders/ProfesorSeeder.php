<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Profesor;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Profesor::count()) {
            return;
        }
        
        Profesor::factory()->create([
            'nombre' => 'Alfonso Estrada',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Daniela Santiago',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Mateo Lara',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Daniel Soto',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Alfonso Silva',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Diego Soto',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Victoria Carrillo',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Manuel Rosas',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Carlos Cabrera',
        ]);
        Profesor::factory()->create([
            'nombre' => 'Uriel Nava',
        ]);
    }
}
