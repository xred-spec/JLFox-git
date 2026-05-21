<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Prenda;

class TipoPrenda extends Model
{
    protected $table = 'tipos_prenda';

    protected $fillable = [
        'nombre'
    ];

    public function prendas(): HasMany {
        return $this->hasMany(Prenda::class);
    }
}
