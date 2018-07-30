<?php

namespace HelpDesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'idArea' => 'required',
            'email' => "unique:usuario,$this->idUsuario,idUsuario",
            'password' => 'string|min:6|max:10',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'dni' => "required|size:8|unique:usuario,dni,$this->idUsuario,idUsuario",
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
            'telefono' => 'required',
            'correo' => "required|unique:usuario,correo,$this->idUsuario,idUsuario",
        ];
    }
}
