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
        Schema::create('colores_tela', function (Blueprint $table) {
            $table->id();
            $table->string('color');
            $table->foreignId('tela_id')->constrained('telas');
            $table->timestamps();

            $table->unique([
                'color', 'tela_id'
            ], 'color_tela_unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colores_tela');
    }
};
