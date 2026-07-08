<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Prenda;

class InventarioPrenda extends Model
{
    use HasFactory;

    protected $table = 'inventario_prendas';

    protected $fillable = [
        'cantidad',
        'prenda_id',
    ];

    public function prenda(): BelongsTo {
        return $this->belongsTo(Prenda::class);
    }
}
