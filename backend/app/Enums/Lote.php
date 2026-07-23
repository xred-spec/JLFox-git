<?php

namespace App\Enums;

enum Lote: string {
    case PENDIENTE = 'pendiente';
    case PRODUCCION = 'produccion';
    case TERMINADO = 'terminado';
}