<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    public function index()
    {
        return view('profesores', ['profesores' => Profesor::all()]);
    }

    public function evalua($id)
    {
        return view('formulario', ['profesor' => Profesor::find($id)]);
    }

    public function evaluaForm(Request $request, $id)
    {
        $comentario = Comentario::create([
            'profesor_id' => $id,
            'nombre_estudiante' =>  $request->input('nombre'),
            'correo_estudiante' =>  $request->input('correo'),
            'calificacion' =>  $request->input('calificacion'),
            'comentario' =>  $request->input('comentario'),
        ]);

        if ($comentario->trashed())
        {
            return redirect('/')->with('error', 'El comentario no pudo ser publicado');
        }

        return redirect('/')->with('status', 'Tu evaluación ha sido registrada');
    }
}
