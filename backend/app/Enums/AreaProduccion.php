<?php

namespace App\Enums;

enum AreaProduccion: string {
    case MANUAL = 'manual';
    case COSTURA = 'costura';
    case PLANCHA = 'plancha';
    case FUSION = 'fusion';
}