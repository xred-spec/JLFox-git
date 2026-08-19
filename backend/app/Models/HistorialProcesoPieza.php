<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PrendaLotePieza;

class HistorialProcesoPieza extends Model
{
    protected $table = 'historial_procesos_piezas';
    protected $fillable = [
        'prenda_lote_pieza_id',
        'proceso_orden',
        'cantidad_procesada',
        'tiempo_hora',
        'tiempo_minuto',
        'tiempo_segundo',
    ];
    protected $guarded = [];

    public function pieza_lote(): BelongsTo {
        return $this->belongsTo(PrendaLotePieza::class, 'prenda_lote_pieza_id');
    }
}
