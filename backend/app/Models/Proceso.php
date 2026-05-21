<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PrendaProceso;
use App\Models\PrendaSubProceso;

class Proceso extends Model
{
    protected $table = 'procesos';

    protected $fillable = [
        'nombre'
    ];

    public function prendasProcesos(): HasMany {
        return $this->hasMany(PrendaProceso::class);
    }

    public function subProcesos(): HasMany {
        return $this->hasMany(PrendaSubProcesos::class);
    }
}
