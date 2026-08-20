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
            'id' => $this->id,
            'cantidad_proceso' => $this->cantidad_proceso,
            'cantidad_final_pieza' => $this->cantidad_final_pieza,
            'proceso_actual' => $this->proceso_actual,
            'prenda_lote_id' => $this->prenda_lote_id,
            'prenda_pieza_id' => $this->prenda_pieza_id,
            'tiempo_realizado_hora' => $this->tiempo_realizado_hora,
            'tiempo_realizado_minuto' => $this->tiempo_realizado_minuto,
            'tiempo_realizado_segundo' => $this->tiempo_realizado_segundo,
            'tiempo_final_hora' => $this->tiempo_final_hora,
            'tiempo_final_minuto' => $this->tiempo_final_minuto,
            'tiempo_final_segundo' => $this->tiempo_final_segundo,
            'historial_procesos' => HistorialProcesoPiezaResource::collection($this->whenLoaded('historial_procesos'))
        ];
    }
}
