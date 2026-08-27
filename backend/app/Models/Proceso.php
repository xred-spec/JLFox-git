<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PrendaProceso;
use App\Models\AreaProduccion;

class Proceso extends Model
{
    use HasFactory;

    protected $table = 'procesos';

    protected $fillable = [
        'descripcion',
        'area_id',
    ];

    public function prendas_procesos(): HasMany {
        return $this->hasMany(PrendaProceso::class);
    }

    public function area(): BelongsTo {
        return $this->belongsTo(AreaProduccion::class);
    }
}
