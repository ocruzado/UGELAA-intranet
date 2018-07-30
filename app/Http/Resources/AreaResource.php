<?php

namespace HelpDesk\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idArea' => $this->idArea,
            'idAreaPadre' => $this->idAreaPadre,
            'nombre' => $this->nombre,
            'siglas' => $this->siglas,
            'descripcion' => $this->descripcion
        ];
    }
}
