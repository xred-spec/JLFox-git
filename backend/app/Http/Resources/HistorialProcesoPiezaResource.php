<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PrendaLotePiezaResource;

class HistorialProcesoPiezaResource extends JsonResource
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
            'prenda_lote_pieza_id' => $this->prenda_lote_pieza_id,
            'proceso_orden' => $this->proceso_orden,
            'cantidad_procesada' => $this->cantidad_procesada,
            'tiempo_hora' => $this->tiempo_hora,
            'tiempo_minuto' => $this->tiempo_minuto,
            'tiempo_segundo' => $this->tiempo_segundo,
            'pieza_lote' => PrendaLotePiezaResource::make($this->whenLoaded('pieza_lote'))
        ];
    }
}
