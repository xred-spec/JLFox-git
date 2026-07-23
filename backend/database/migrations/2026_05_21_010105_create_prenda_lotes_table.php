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
        Schema::create('prendas_lote', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_prevista');
            $table->integer('cantidad_proceso')->nullable();
            $table->integer('cantidad_final')->nullable();
            $table->integer('proceso_actual')->nullable();
            $table->foreignId('lote_id')->constrained('lotes')->onDelete('cascade');
            $table->foreignId('prenda_id')->constrained('prendas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prendas_lote');
    }
};
