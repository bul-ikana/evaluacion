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
        $profesores_table = env('APP_ENV') === "testing" ? "profesores" : "Universidad.profesores";

        Schema::create('comentarios', function (Blueprint $table) use ($profesores_table) {
            $table->id();
            $table->unsignedBigInteger('profesor_id');
            $table->string('nombre_estudiante');
            $table->string('correo_estudiante');
            $table->integer('calificacion');
            $table->string('comentario');
            $table->timestamps();

             $table
                ->foreign('profesor_id')
                ->references('id')
                ->on($profesores_table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
