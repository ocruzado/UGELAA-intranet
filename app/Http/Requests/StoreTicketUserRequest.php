<?php

namespace HelpDesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idArea' => 'required|gt:0',
            'idCategoria' => 'required|gt:0',
            'descripcion' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
//            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg|max:2048',
            'image' => 'sometimes|required|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'idArea.gt' => 'Debe seleccionar un Area',
            'idCategoria.gt' => 'Debe seleccionar una Categoria',
        ];
    }
}
