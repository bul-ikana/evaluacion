<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Profesor;
use App\Models\Comentario;

class ComentariosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPuedoVerLosComentariosDeOtrosEstudiantes()
    {
        $response = $this->get('/');
        $profesores = $response->getOriginalContent()->getData()['profesores'];
        $profesor = $profesores->random();
        $comentarios_on_profesor = count($profesor->comentarios);
        

        $this->assertEquals(Profesor::find($profesor->id)->comentarios()->count(), $comentarios_on_profesor);
    }

    public function testPuedoCalificarAMiProfesorYDejarUnComentarioATravésDeUnFormulario()
    {
        $profesor = Profesor::all()->random();
        $comentario = "comentario";

        $response = $this->post("evalua/". $profesor->id, [
            'nombre' => 'nombre',
            'correo' => 'nombre@correo.com',
            'calificacion' => '10',
            'comentario' => $comentario,
        ]);

        $this-> assertEquals($comentario, $profesor->comentarios()->orderByDesc('created_at')->first()->comentario);
    }

    public function testPuedoPublicarUnComentarioSinPalabrasRestringidas()
    {
        $profesor = Profesor::all()->random();
        $comentario = "comentario sin palabras restringidas";

        $response = $this->post("evalua/". $profesor->id, [
            'nombre' => 'nombre',
            'correo' => 'nombre@correo.com',
            'calificacion' => '10',
            'comentario' => $comentario,
        ]);

        $response->assertSessionHas('status');
    }
    
    public function testNoPuedoPublicarUnComentarioConPalabrasRestringidas()
    {
        $profesor = Profesor::all()->random();
        $comentario = "PINCHE profe pendejo";

        $response = $this->post("evalua/". $profesor->id, [
            'nombre' => 'nombre',
            'correo' => 'nombre@correo.com',
            'calificacion' => '10',
            'comentario' => $comentario,
        ]);

        $response->assertSessionHas('error');
    }
}
