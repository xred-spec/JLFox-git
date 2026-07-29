<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TipoPrendaResource;
use App\Http\Resources\ProcesoResource;

class PrendaPiezaResource extends JsonResource
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
            'nombre' => $this->nombre,
            'tipo_prenda' => TipoPrendaResource::make($this->tipo_prenda),
            'procesos' => ProcesoResource::collection($this->whenLoaded('procesos'))
        ];
    }
}
