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
        Schema::create('prendas_procesos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prenda_pieza_id')->constrained('prenda_piezas')->onDelete('cascade');
            $table->foreignId('proceso_id')->constrained('procesos')->onDelete('cascade');
            $table->integer('orden');
            $table->timestamps();

            $table->unique([
                'prenda_pieza_id', 'proceso_id'
            ], 'prenda_proceso_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prendas_procesos');
    }
};
