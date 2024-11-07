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
        Schema::create('llas', function (Blueprint $table) {
            $table->id();

            /* Datos del Memo */
            $table->integer('numero');
            $table->string('cite');
            $table->string('fecha_entrega');
            /* Herramientas */
            $table->string('observacion');
            $table->string('estado')->default('No entregado');
            $table->string('color');
            /* Copias */
            $table->boolean('copia')->default(0);
            $table->boolean('habilitacion')->default(0);
            $table->boolean('file')->default(0);
            $table->boolean('direccion')->default(0);
            $table->boolean('bienes')->default(0);
            /* Relacion */
            $table->unsignedBigInteger('personals_id')->nullable();
            $table->foreign('personals_id')
            ->references('id')
            ->on('personals')
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
        Schema::dropIfExists('llas');
    }
};
