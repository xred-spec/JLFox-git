<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\HistorialProcesoPiezaResource;

class PrendaLotePiezaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cantidad_proceso' => $this->cantidad_proceso,
            'proceso_actual' => $this->proceso_actual,
            'prenda_lote_id' => $this->prenda_lote_id,
            'prenda_pieza_id' => $this->prenda_pieza_id,
            'tiempo_realizado_hora' => $this->tiempo_realizado_hora,
            'tiempo_realizado_hora' => $this->tiempo_realizado_hora,
            'historial' => HistorialProcesoPiezaResource::collection($this->whenLoaded('historial_procesos'))
        ];
    }
}
