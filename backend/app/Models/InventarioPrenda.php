<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Prenda;

class InventarioPrenda extends Model
{
    protected $table = 'inventario_prendas';

    protected $fillable = [
        'cantidad_inventario',
        'prenda_id',
    ];

    public function prendas(): HasMany {
        return $this->hasMany(Prenda::class);
    }
}
