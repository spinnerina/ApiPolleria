<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'prod_cod' => 'required|min:3',
            'prod_descri' => 'required|min:5',
            'prod_precio_lista' => 'required|numeric',
            'prov_id' => 'required|integer'
        ];
    }
}
