<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estados_condiciones_requeridas_afiliados', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('idCondicionReq');
            $table->unsignedBigInteger('idMiembro');                    
            $table->string('valor')->nullable();            
            $table->string('estado');
            $table->date('fechaRegistro')->nullable();
            $table->unsignedBigInteger('idResponsable')->nullable();            

            // Foreign keys
            $table->foreign('idCondicionReq')->references('id')->on('condiciones_requeridas')->onDelete('cascade');
            $table->foreign('idMiembro')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados_condiciones_requeridas_afiliados');
    }
};
