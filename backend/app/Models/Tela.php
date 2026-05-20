<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ColorTela;

class Tela extends Model
{
    protected $table = 'telas';

    protected $fillable = [
        'nombre'
    ];

    public function coloresTela(): HasMany {
        return $this->hasMany(ColorTela::class);
    }
}