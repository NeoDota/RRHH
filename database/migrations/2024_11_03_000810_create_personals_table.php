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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            /* Datos Personales */
            $table->string('primer_nombre', 50);
            $table->string('segundo_nombre', 50)->nullable();
            $table->string('apellido_paterno', 50)->nullable();
            $table->string('apellido_materno', 50)->nullable();
            $table->string('ci');
            $table->string('complemento');
            $table->string('telefono')->nullable();
            /* Datos Profesionales */
            $table->string('cargo')->nullable();
            $table->string('item')->nullable();
            $table->string('establecimiento')->nullable();
            $table->string('red')->nullable();
            /* Datos Extras */
            /* Datos de Especialidad */
            $table->string('especialidad')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            /* Datos de Transferencia */
            $table->string('cargo_anterior')->nullable();
            $table->string('item_anterior')->nullable();
            $table->string('establecimiento_anterior')->nullable();
            $table->string('red_anterior')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
