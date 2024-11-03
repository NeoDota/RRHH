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
        Schema::create('comisions', function (Blueprint $table) {
            $table->id();

            $table->string('cite');
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
        Schema::dropIfExists('comisions');
    }
};
