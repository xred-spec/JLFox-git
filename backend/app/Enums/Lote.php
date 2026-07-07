<?php

namespace App\Enums;

enum Prenda: string {
    case PENDIENTE = 'pendiente';
    case PRODUCCION = 'producción';
    case TERMINADO = 'terminado';
}