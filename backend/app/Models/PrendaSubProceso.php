<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PrendaProceso;
use App\Models\PrendaLote;

class PrendaSubProceso extends Model
{
    protected $table = 'prenda_sub_procesos';

    protected $fillable = [
        'nombre',
        'prenda_proceso_id'
    ];

    public function prenda_proceso(): BelongTo {
        return $this->belongsTo(PrendaProceso::class);
    }

    public function predas_lotes(): hasMany {
        return $this->hasMany(PrendaLote::class);
    }
}
