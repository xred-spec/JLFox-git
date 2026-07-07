<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PrendaLote;

class Lote extends Model
{
    protected $table = 'lotes';

    protected $fillable = [
        'estado',
        'fecha_inicio',
        'fecha_final',
    ];

    public function prendas_lote(): HasMany {
        return $this->hasMany(PrendaLote::class);
    }
}
