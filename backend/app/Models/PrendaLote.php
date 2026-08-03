<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Lote;
use App\Models\Prenda;
use App\Models\PrendaProceso;


class PrendaLote extends Model
{
    use HasFactory;

    protected $table = 'prendas_lote';

    protected $fillable = [
        'cantidad_prevista',
        'cantidad_final',
        'lote_id',
        'prenda_id',
    ];

    public function lote(): BelongsTo {
        return $this->belongsTo(Lote::class);
    }

    public function prenda(): BelongsTo {
        return $this->belongsTo(Prenda::class);
    }
}
