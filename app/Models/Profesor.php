<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Profesor extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $connection = 'universidad';
    protected $table = 'profesores';

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    protected function promedio(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->comentarios->avg('calificacion'), 1, '.'),
        );
    }
}
