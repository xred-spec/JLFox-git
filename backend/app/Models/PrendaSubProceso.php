<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Proceso;

class PrendaSubProceso extends Model
{
    protected $table = 'prenda_sub_procesos';

    protected $fillable = [
        'nombre',
        'prenda_proceso_id'
    ];

    public function prendaProceso(): BelongTo {
        return $this->belongsTo(Proceso::class);
    }
}
