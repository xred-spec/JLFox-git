<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TipoPrenda;
use App\Models\PrendaProceso;

class Prenda extends Model
{
    protected $table = 'prendas';

    protected $fillable = [
        'tipo',
        'talla',
        'tipo_prenda_id',
        'color_id',
        'bordado_id',
        'forro_id',
        'cartera_id',
    ];

    public function tipoPrenda(): BelongsTo{
        return $this->belongsTo(TipoPrenda::class);
    }

    public function prendasProcesos(): HasMany {
        return $this->hasMany(PrendaProceso::class);
    }
}
