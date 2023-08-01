<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'prov_nombre' => 'required|min:5',
            'prov_telefono' => 'required|max:12',
            'prov_direccion' => 'required|min:5',
            'loc_id' => 'required|integer',
            'prov_fecha_pag' => 'required|date'
        ];
    }
}
