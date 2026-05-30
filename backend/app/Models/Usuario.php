<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Rol;

class Usuario extends Model
{
    use HasApiTokens;

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