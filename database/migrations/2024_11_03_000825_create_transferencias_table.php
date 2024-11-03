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
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id();

            $table->string('cargo');
            $table->string('lugar');
            $table->string('red');
            $table->string('observacion');
            $table->string('fecha_entrega');
            $table->string('Estado');
            /* transf */
            $table->integer('anterior_item');
            $table->string('anterior_cargo');
            $table->string('anterior_lugar');
            $table->string('anterior_red');

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
        Schema::dropIfExists('transferencias');
    }
};
