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

        Schema::connection($connection)->create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('matricula');
            $table->string('password');
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
        Schema::connection($connection)->dropIfExists('empleados');
    }
};
