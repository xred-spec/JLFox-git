<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Prenda;
use App\Models\Proceso;

class PrendaProceso extends Model
{
    use HasFactory;

    protected $table = 'prendas_procesos';

    protected $fillable = [
        'prenda_pieza_id',
        'proceso_id',
        'orden'
    ];

    public function prenda(): BelongsTo {
        return $this->belongsTo(Prenda::class);
    }

    public function proceso(): BelongsTo {
        return $this->belongsTo(Proceso::class);
    }
}
