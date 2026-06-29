<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ColorHiloResource;

class BordadoResource extends JsonResource
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
            'forma' => $this->forma,
            'color_hilo' => ColorHiloResource::make($this->whenLoaded('color_hilo')),
        ];
    }
}
