<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Empleado;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Empleado::count()) {
            return;
        }

        Empleado::create([
            'nombre' => 'Hugo Aguirre',
            'matricula' => '123',
            'password' => \Hash::make('123')
        ]);
    }
}
