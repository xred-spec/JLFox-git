<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prenda;

class Forro extends Model
{
    use HasFactory;

    protected $table = 'forros';

    protected $fillable = [
        'color'
    ];

    public function prendas(): HasMany {
        return $this->hasMany(Prenda::class);
    }
}