<?php

namespace HelpDesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCategoriaRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'idCategoria' => 'integer',
            'idCategoriaPadre' => 'integer',
            'nombre' => 'required',
        ];
    }
}