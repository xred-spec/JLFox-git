<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Proceso;

class AreaProduccion extends Model
{
    use HasFactory;

    protected $table = 'areas_produccion';

    protected $fillable = [
        'nombre'
    ];

    public function procesos(): HasMany {
        return $this->hasMany(Procesos::class);
    }
}
