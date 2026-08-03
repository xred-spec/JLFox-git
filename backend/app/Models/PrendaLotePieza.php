<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PrendaLote;
use App\Models\PrendaPieza;

class PrendaLotePieza extends Model
{
    protected $table = 'prenda_lote_piezas';

    protected $fillable = [
        'prenda_lote_id',
        'prenda_pieza_id',
        'proceso_actual',
        'cantidad_proceso'
    ];

    public function pieza(): BelongsTo {
        return $this->belongsTo(PrendaPieza::class);
    }

    public function prenda_lote(): BelongsTo {
        return $this->belongsTo(PrendaLote::class);
    }
}
