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
        Schema::create('prendas', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['adulto', 'niño'])->default('adulto');
            $table->integer('talla');
            $table->boolean('tiene_cartera')->default(false);
            $table->boolean('cartera_tiene_bordado')->default(false);

            $table->foreignId('tipo_prenda_id')->constrained('tipos_prenda');
            $table->foreignId('color_tela_id')->constrained('colores_tela');

            $table->foreignId('bordado_id')->nullable()->constrained('bordados');
            $table->foreignId('forro_id')->nullable()->constrained('forros');
            //$table->foreignId('cartera_id')->nullable()->constrained('carteras');

            $table->timestamps();

            $table->unique([
                'tipo', 'talla', 
                'tipo_prenda_id', 'color_tela_id',
                'bordado_id', 'forro_id',
            ], 'indice_prenda_unica');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prendas');
    }
};
