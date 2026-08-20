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
        'cantidad_proceso',
        'cantidad_final_pieza',
        'proceso_actual',
        'prenda_lote_id',
        'prenda_pieza_id',
        'tiempo_realizado_hora',
        'tiempo_realizado_minuto',
        'tiempo_realizado_segundo',
        'tiempo_final_hora',
        'tiempo_final_minuto',
        'tiempo_final_segundo',
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
