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
        Schema::create('atencions', function (Blueprint $table) {
            $table->id();

            $table->string('cargo');
            $table->string('lugar');
            $table->string('red');
            $table->string('observacion');
            $table->string('fecha_entrega');
            $table->string('Estado');
            /* Copias */
            $table->string('copia');
            $table->string('habilitacion');
            $table->string('file');
            $table->string('direccion');
            $table->string('bienes_servicios');
            /* Relacion */
            $table->unsignedBigInteger('personal_id')->nullable();
            $table->foreign('personal_id')
            ->references('id')
            ->on('personal')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencions');
    }
};
