<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forro extends Model
{
    use HasFactory;

    protected $table = 'forros';

    protected $fillable = [
        'color'
    ];
}