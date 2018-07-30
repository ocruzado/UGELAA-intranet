<?php

namespace HelpDesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAreaRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'idArea' => 'integer',
            'idAreaPadre' => 'integer',
            'nombre' => 'required',
            'siglas' => "required|unique:area,siglas,$this->idArea,idArea|max:50|regex:/^[a-zA-Z0-9-]+$/"
        ];
    }
}