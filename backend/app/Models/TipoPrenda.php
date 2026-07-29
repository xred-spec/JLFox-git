<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Prenda;
use App\Models\PrendaPieza;

class TipoPrenda extends Model
{
    use HasFactory;

    protected $table = 'tipos_prenda';

    protected $fillable = [
        'nombre'
    ];

    public function piezas(): HasMany {
        return $this->hasMany(PrendaPieza::class);
    }

    public function prendas(): HasMany {
        return $this->hasMany(Prenda::class);
    }
}
