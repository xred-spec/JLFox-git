<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Tela;

class ColorTela extends Model
{
    protected $table = 'colores_tela';

    protected $fillable = [
        'nombre',
        'tela_id'
    ];

    public function tela(): BelongsTo {
        return $this->belongsTo(Tela::class);
    }
}
