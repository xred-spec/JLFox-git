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
        Schema::create('prenda_lote_piezas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prenda_lote_id')->constrained('prendas_lote')->onDelete('cascade');
            $table->foreignId('prenda_pieza_id')->constrained('prenda_piezas')->onDelete('cascade');
            $table->integer('proceso_actual')->nullable();
            $table->integer('cantidad_proceso')->nullable();
            $table->integer('cantidad_final_pieza')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->time('tiempo_produccion_final')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prenda_lote_piezas');
    }
};
