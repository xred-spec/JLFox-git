<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bordado;

class ColorHilo extends Model
{
    protected $table = 'colores_hilo';

    protected $fillable = [
        'color'
    ];

    public function bordados(): HasMany {
        return $this->hasMany(Bordado::class);
    }
}
