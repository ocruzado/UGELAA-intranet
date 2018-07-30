<?php

namespace HelpDesk\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idCategoria' => $this->idCategoria,
            'idCategoriaPadre' => $this->idCategoriaPadre,
            'nombre' => $this->nombre,
        ];
    }
}
