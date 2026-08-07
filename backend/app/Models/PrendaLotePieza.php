<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PrendaLote;
use App\Models\PrendaPieza;
use App\Models\HistorialProcesoPieza;

class PrendaLotePieza extends Model
{
    protected $table = 'prenda_lote_piezas';

    protected $fillable = [
        'prenda_lote_id',
        'prenda_pieza_id',
        'proceso_actual',
        'cantidad_proceso',
        'hora_inicio',
        'hora_final'
    ];

    public function pieza(): BelongsTo {
        return $this->belongsTo(PrendaPieza::class);
    }

    public function prenda_lote(): BelongsTo {
        return $this->belongsTo(PrendaLote::class);
    }

    public function historial_procesos(): HasMany {
        return $this->hasMany(HistorialProcesoPieza::class, 'prenda_lote_pieza_id');
    }
}
