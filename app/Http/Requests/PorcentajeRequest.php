<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PorcentajeRequest extends FormRequest
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
            'por_porcentaje' => 'required|numeric',
            'prod_id' => 'required|integer' 
        ];
    }
}
