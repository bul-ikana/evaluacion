<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comentarios';
    protected $connection = 'mysql';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    const RESTRICTED_WORDS = [
        'pendejo',  'pendeja',
        'cabron',   'cabrona',
        'culero',   'culera',
        'mamon',    'mamona',
        'ching',    'pinche',
        'verga',    'wey',
        'mamada',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (\Str::contains(\Str::lower($model->comentario), self::RESTRICTED_WORDS)){
                $model->deleted_at = now();
            }
        });
    }
}
