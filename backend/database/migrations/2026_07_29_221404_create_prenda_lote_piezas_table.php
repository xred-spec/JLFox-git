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
            $table->integer('tiempo_realizado_hora')->nullable();
            $table->integer('tiempo_realizado_minuto')->nullable();
            $table->integer('tiempo_realizado_segundo')->nullable();
            $table->integer('tiempo_final_hora')->nullable();
            $table->integer('tiempo_final_minuto')->nullable();
            $table->integer('tiempo_final_segundo')->nullable();
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
