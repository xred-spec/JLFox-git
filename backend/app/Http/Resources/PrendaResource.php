<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TipoPrendaResource;
use App\Http\Resources\ColorTelaResource;
use App\Http\Resources\BordadoResource;
use App\Http\Resources\ForroResource;

class PrendaResource extends JsonResource
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
            'tipo' => $this->tipo,
            'talla' => $this->talla,
            'tipo_prenda' => TipoPrendaResource::make($this->tipo_prenda),
            'color_tela' => ColorTelaResource::make($this->color_tela),
            'bordado' => BordadoResource::make($this->bordado),
            'forro' => ForroResource::make($this->forro),
            'tiene_cartera' => $this->tiene_cartera,
            'procesos' => PrendaProcesoResource::collection($this->whenLoaded('prenda_procesos')),
        ];
    }
}
