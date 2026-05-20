<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    protected $table = 'carteras';

    protected $fillable = [
        'tiene_bordado'
    ];
}