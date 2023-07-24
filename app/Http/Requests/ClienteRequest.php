<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cli_nombre' => 'required|min:5',
            'cli_mail' => 'required|min:5',
            'cli_telefono' => 'required|max:12',
            'cli_dni' => 'max:8',
            'cli_cuit' => 'max:11',
            'cli_direccion' => 'required|min:5',
            'loc_id' => 'required|integer',
            'iva_id' => 'required|integer'
        ];
    }
}
