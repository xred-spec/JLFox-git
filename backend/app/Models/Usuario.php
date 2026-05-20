<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Rol;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'username',
        'password',
        'email',
        'rol_id'
    ];

    public function rol(): BelongsTo {
        return $this->belongsTo(Rol::class);
    }
}