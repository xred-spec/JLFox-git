<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Lote;
use App\Models\PrendaProceso;

class PrendaLote extends Model
{
    use HasFactory;

    protected $table = 'prendas_lote';

    protected $fillable = [
        'cantidad_prevista',
        'cantidad_proceso',
        'cantidad_final',
        'proceso_actual',
        'lote_id',
        'prenda_proceso_id',
    ];

    public function lote(): BelongsTo {
        return $this->belongsTo(Lote::class);
    }

    public function prenda_proceso(): BelongsTo {
        return $this->belongsTo(PrendaProceso::class);
    }
}
