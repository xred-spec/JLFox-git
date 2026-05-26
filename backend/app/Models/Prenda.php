<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TipoPrenda;
use App\Models\PrendaProceso;
use App\Models\InventarioPrenda;

class Prenda extends Model
{
    protected $table = 'prendas';

    protected $fillable = [
        'tipo',
        'talla',
        'tiene_cartera',
        'cartera_tiene_bordado',
        'tipo_prenda_id',
        'color_id',
        'bordado_id',
        'forro_id',
        //'cartera_id',
    ];

    public function tipoPrenda(): BelongsTo{
        return $this->belongsTo(TipoPrenda::class);
    }

    public function prendasProcesos(): HasMany {
        return $this->hasMany(PrendaProceso::class);
    }

    public function inventarioPrenda(): BelongsTo{
        return $this->belongsTo(InventarioPrenda::class);
    }
}
