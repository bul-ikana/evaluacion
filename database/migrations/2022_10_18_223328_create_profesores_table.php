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

        Schema::connection($connection)->create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cedula');
            $table->string('contrato');
            $table->date('fecha_inicio');
            $table->string('foto');
            $table->timestamps();
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

        Schema::connection($connection)->dropIfExists('profesores');
    }
};
