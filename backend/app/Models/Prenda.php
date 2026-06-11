<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TipoPrenda;
use App\Models\ColorTela;
use App\Models\Bordado;
use App\Models\Forro;
use App\Models\PrendaProceso;
use App\Models\InventarioPrenda;

class Prenda extends Model
{
    use HasFactory;

    protected $table = 'prendas';

    protected $fillable = [
        'tipo',
        'talla',
        'tiene_cartera',
        'cartera_tiene_bordado',
        'tipo_prenda_id',
        'color_tela_id',
        'bordado_id',
        'forro_id',
        //'cartera_id',
    ];

    public function tipo_prenda(): BelongsTo{
        return $this->belongsTo(TipoPrenda::class);
    }

    public function color_tela(): BelongsTo{
        return $this->belongsTo(ColorTela::class);
    }

    public function bordado(): BelongsTo{
        return $this->belongsTo(Bordado::class);
    }

    public function forro(): BelongsTo{
        return $this->belongsTo(Forro::class);
    }

    public function prenda_procesos(): HasMany {
        return $this->hasMany(PrendaProceso::class);
    }

    public function inventario_prenda(): BelongsTo{
        return $this->belongsTo(InventarioPrenda::class);
    }
}
