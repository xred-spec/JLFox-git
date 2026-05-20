<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ColorHilo;

class Bordado extends Model
{
    protected $table = 'bordados';

    protected $fillable = [
        'forma',
        'color_hilo_id'
    ];

    public function colorHilo(): BelongsTo {
        return $this->belongsTo(ColorHilo::class);
    }
}