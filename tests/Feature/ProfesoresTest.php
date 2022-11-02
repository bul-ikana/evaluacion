<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Profesor;

class ProfesoresTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPuedoVerUnaPáginaQueIncluyaUnaListaDeProfesores()
    {
        $response = $this->get('/');
        $profesores_on_response = count($response->getOriginalContent()->getData()['profesores']);

        $this->assertEquals(Profesor::count(), $profesores_on_response);
    }

    public function testPuedoVerLasMateriasQueEnseñaCadaProfesor()
    {
        $response = $this->get('/');
        $profesores = $response->getOriginalContent()->getData()['profesores'];
        $profesor = $profesores->random();
        $materias_on_profesor = count($profesor->materias);
        

        $this->assertEquals(Profesor::find($profesor->id)->materias->count(), $materias_on_profesor);
    }
}
