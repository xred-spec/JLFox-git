<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LoteResource;
use App\Http\Resources\PrendaResource;

class PrendaLoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cantidad_prevista' => $this->cantidad_prevista,
            'cantidad_proceso' => $this->cantidad_proceso,
            'cantidad_final' => $this->cantidad_final,
            'proceso_actual' => $this->proceso_actual,
            'lote' => LoteResource::make($this->whenLoaded('lote')),
            'prenda' => PrendaResource::make($this->whenLoaded('prenda_proceso'))
        ];
    }
}
