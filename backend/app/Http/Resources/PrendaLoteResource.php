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
            'id' => $this->id,
            'cantidad_prevista' => $this->cantidad_prevista,
            'cantidad_final_prenda' => $this->cantidad_final_prenda,
            //'lote' => LoteResource::make($this->whenLoaded('lote')),
            'prenda' => PrendaResource::make($this->whenLoaded('prenda'))
        ];
    }
}
