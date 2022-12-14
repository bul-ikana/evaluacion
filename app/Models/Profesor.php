<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Profesor extends Model
{
    use HasFactory;
    protected $connection = 'universidad';
    protected $table = 'profesores';

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    
    protected function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    protected function promedio(): Attribute
    {
        $promedio = $this->comentarios->avg('calificacion');
        return Attribute::make(
            get: fn() => $promedio ? number_format($promedio, 1, '.') : '-',
        );
    }

    protected function materias(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->cursos->map(fn($m) => $m->materia->nombre),
        );
    }
}
