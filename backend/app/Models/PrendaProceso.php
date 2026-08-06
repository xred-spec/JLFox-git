<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PrendaPieza;
use App\Models\Proceso;

class PrendaProceso extends Model
{
    use HasFactory;

    protected $table = 'prendas_procesos';

    protected $fillable = [
        'clave',
        'prenda_pieza_id',
        'proceso_id',
        'orden',
        'tiempo_previsto_hora',
        'tiempo_previsto_minuto',
        'tiempo_previsto_segundo',
    ];

    public function prenda(): BelongsTo {
        return $this->belongsTo(PrendaPieza::class, 'prenda_pieza_id');
    }

    public function proceso(): BelongsTo {
        return $this->belongsTo(Proceso::class);
    }
}
