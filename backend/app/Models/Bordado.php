<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ColorHilo;
use App\Models\Prenda;

class Bordado extends Model
{
    use HasFactory;

    protected $table = 'bordados';

    protected $fillable = [
        'forma',
        'color_hilo_id'
    ];

    public function color_hilo(): BelongsTo {
        return $this->belongsTo(ColorHilo::class);
    }

    public function prendas(): HasMany {
        return $this->hasMany(Prenda::class);
    }
}