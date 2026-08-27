<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PrendaProcesoResource;
use App\Http\Resources\AreaProduccionResource;

class ProcesoResource extends JsonResource
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
            'descripcion' => $this->descripcion,
            'area' => AreaProduccionResource::make($this->whenLoaded('area')),
            'pieza_prenda_proceso' => PrendaProcesoResource::collection($this->whenLoaded('prendas_procesos'))
        ];
    }
}
