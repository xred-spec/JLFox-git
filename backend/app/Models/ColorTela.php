<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Tela;
use App\Models\Prenda;

class ColorTela extends Model
{
    use HasFactory;

    protected $table = 'colores_tela';

    protected $fillable = [
        'color',
        'tela_id'
    ];

    public function tela(): BelongsTo {
        return $this->belongsTo(Tela::class);
    }

    public function prendas(): HasMany {
        return $this->hasMany(Prenda::class);
    }
}
