<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TipoPrendaResource;
use App\Http\Resources\ColorTelaResource;
use App\Http\Resources\BordadoResource;
use App\Http\Resources\ForroResource;
use App\Http\Resources\PrendaLoteResource;
use App\Http\Resources\InventarioPrendaResource;

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
            'tiene_cartera' => $this->tiene_cartera,
            'color_tela' => ColorTelaResource::make($this->whenLoaded('color_tela')),
            'bordado' => BordadoResource::make($this->whenLoaded('bordado')),
            'forro' => ForroResource::make($this->whenLoaded('forro')),
            'tipo_prenda' => TipoPrendaResource::make($this->whenLoaded('tipo_prenda')),
            'lotes' => PrendaLoteResource::collection($this->whenLoaded('lotes')),
            'inventario' => InventarioPrendaResource::collection($this->whenLoaded('inventario_prenda'))
        ];
    }
}
