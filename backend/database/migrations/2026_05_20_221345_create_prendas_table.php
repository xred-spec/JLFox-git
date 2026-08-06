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
            $table->enum('tipo', ['hombre', 'mujer', 'niño'])->default('hombre');
            $table->integer('talla');
            $table->boolean('tiene_cartera')->default(false);

            $table->foreignId('tipo_prenda_id')->constrained('tipos_prenda')->onDelete('cascade');
            $table->foreignId('color_tela_id')->constrained('colores_tela')->onDelete('cascade');
            $table->foreignId('bordado_id')->nullable()->constrained('bordados')->onDelete('cascade');
            $table->foreignId('forro_id')->nullable()->constrained('forros')->onDelete('cascade');

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
