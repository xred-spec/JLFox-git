<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'tipo' => $this.tipo,
            'talla' => $this->talla,
            'tiene_cartera' => $this->tiene_cartera,
            'cartera_tiene_bordado' => $this->cartera_tiene_bordado,
            'tipo_prenda' => $this->tipo_prenda,
        ];
    }
}
