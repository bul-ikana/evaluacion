<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $connection = 'universidad';
    protected $table = 'empleados';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
