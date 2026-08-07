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
        Schema::create('historial_procesos_piezas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prenda_lote_pieza_id')->constrained('prenda_lote_piezas')->onDelete('cascade');
            $table->integer('proceso_orden');
            $table->integer('cantidad_procesada')->nullable();
            $table->integer('tiempo_hora')->default(0);
            $table->integer('tiempo_minuto')->default(0);
            $table->integer('tiempo_segundo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_procesos_piezas');
    }
};
