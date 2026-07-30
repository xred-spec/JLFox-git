<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PrendaProceso;
use App\Models\TipoPrenda;
use App\Models\PrendaLotePieza;

class PrendaPieza extends Model
{
    protected $table = 'prenda_piezas';

    protected $fillable = [
        'nombre',
        'tipo_prenda_id'
    ];

    public function tipo_prenda(): BelongsTo {
        return $this->belongsTo(TipoPrenda::class); 
    }

    public function procesos(): HasMany {
        return $this->hasMany(PrendaProceso::class); 
    }

    public function prenda_lote(): HasMany {
        return $this->hasMany(PrendaLotePieza::class);
    }
}
