<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Lote;
use App\Models\PrendaSubProceso;

class PrendaLote extends Model
{
    protected $table = 'prendas_lote';

    protected $fillable = [
        'cantidad_prevista',
        'cantidad_proceso',
        'cantidad_final',
        'proceso_actual',
        'sub_proceso_actual',
        'lote_id',
        'prenda_sub_proceso_id',
    ];

    public function lote(): BelongsTo {
        return $this->belongsTo(Lote::class);
    }

    public function prendaSubProceso(): BelongsTo {
        return $this->belongsTo(PrendaSubProceso::class);
    }
}
