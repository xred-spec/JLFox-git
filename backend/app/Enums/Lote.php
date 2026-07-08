<?php

namespace App\Enums;

enum Lote: string {
    case PENDIENTE = 'pendiente';
    case PRODUCCION = 'producción';
    case TERMINADO = 'terminado';
}