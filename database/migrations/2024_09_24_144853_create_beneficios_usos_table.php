<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('beneficios_usos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_beneficio');
            $table->unsignedBigInteger('id_miembro');
            $table->date('fecha_uso');

            // Relaciones con otras tablas (si aplica)
            $table->foreign('id_beneficio')->references('id')->on('beneficios');
            $table->foreign('id_miembro')->references('id')->on('miembros');

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
        Schema::dropIfExists('beneficios_usos');
    }
};
