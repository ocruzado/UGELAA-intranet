<?php

namespace HelpDesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsignacionAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'idUsuario' => 'required|exists:usuario,idUsuario',
            'idUsuarioSupervisor' => "required|exists:usuario,idUsuario",
        ];
    }
}
