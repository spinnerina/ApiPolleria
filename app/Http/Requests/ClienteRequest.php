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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cli_nombre' => 'required|min:5',
            'cli_mail' => 'required|min:5',
            'cli_telefono' => 'required|max:12',
            'cli_dni' => 'required|max:8',
            'cli_cuit' => 'required|max:11',
            'cli_domicilio' => 'required|min:5',
            'cli_activo' => 'required|boolean',
            'loc_id' => 'required|integer'
        ];
    }
}
