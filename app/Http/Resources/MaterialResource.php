<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
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
            'estado' => $this->estado,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'stock_minimo' => $this->stock_minimo,
            'categoria' => new CategoryResource($this->category),
        ];
    }
}
