<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empleado extends Authenticatable
{
    protected $connection = 'universidad';
    protected $table = 'empleados';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
