<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $connection = 'universidad';
    protected $table = 'materias';

    protected function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
