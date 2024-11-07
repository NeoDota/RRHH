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
        Schema::create('superiors', function (Blueprint $table) {
            $table->id();

            $table->string('tipo');
            $table->string('municipio');
            $table->string('red');

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
        Schema::dropIfExists('superiors');
    }
};
