<?php

namespace HelpDesk\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idUsuario' => $this->idUsuario,
            'email' => $this->email,
            'idArea' => $this->idArea,
//            'password' => $this->password,
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'dni' => $this->dni,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
        ];
    }
}
