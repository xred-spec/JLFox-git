<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProcesoResource;
use App\Http\Resources\PrendaPiezaResource;

class PrendaProcesoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'clave' => $this->clave,
            'orden' => $this->orden,
            'proceso' => ProcesoResource::make($this->whenLoaded('proceso')), 
            'pieza_prenda' => PrendaPiezaResource::make($this->whenLoaded('prenda')),
            'tiempo_previsto_hora' => $this->tiempo_previsto_hora,
            'tiempo_previsto_minuto' => $this->tiempo_previsto_minuto,
            'tiempo_previsto_segundo' => $this->tiempo_previsto_segundo,
        ];
    }
}
