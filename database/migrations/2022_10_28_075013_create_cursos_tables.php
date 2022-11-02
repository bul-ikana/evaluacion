<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = env('APP_ENV') === "testing" ? "sqlite" : "universidad";
        $db = env('APP_ENV') !== "testing" ? "Universidad." : "";

        Schema::connection($connection)->create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('matricula');
            $table->string('correo');
            $table->date('fecha_nacimiento');
            $table->string('contrasena');
            $table->timestamps();
        });
        
        Schema::connection($connection)->create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::connection($connection)->create('cursos', function (Blueprint $table) use ($db) {
            $table->id();
            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('materia_id');
            $table->string('turno');
            $table->timestamps();

            $table
                ->foreign('profesor_id')
                ->references('id')
                ->on($db.'profesores');

            $table
                ->foreign('materia_id')
                ->references('id')
                ->on($db.'materias');
        });

        Schema::connection($connection)->create('cursos_estudiantes', function (Blueprint $table) use ($db) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('estudiante_id');

            $table
                ->foreign('curso_id')
                ->references('id')
                ->on($db.'cursos');

            $table
                ->foreign('estudiante_id')
                ->references('id')
                ->on($db.'estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = env('APP_ENV') === "testing" ? "sqlite" : "universidad";

        Schema::connection($connection)->dropIfExists('cursos_estudiantes');
        Schema::connection($connection)->dropIfExists('cursos');
        Schema::connection($connection)->dropIfExists('materias');
        Schema::connection($connection)->dropIfExists('estudiantes');
    }
};
