<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Proceso;
use App\Models\PrendaLote;

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

    public function predasLotes(): hasMany {
        return $this->hasMany(PrendaLote::class);
    }
}
