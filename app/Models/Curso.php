<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Curso extends Model
{
    use HasFactory;
    protected $connection = 'universidad';
    protected $table = 'cursos';
    protected $with = ['materia'];

    protected function estudiantes()
    {
        return $this->belongsToMany(Estudiantes::class);
    }

    protected function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

}
