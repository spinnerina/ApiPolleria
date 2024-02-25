<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaxProductoRequest extends FormRequest
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
            'cantidad' => 'required|integer|min:1',
            'ven_id' => 'required|exists:Venta,ven_id',
            'prod_id' => 'required|exists:Producto,prod_id',
        ];
    }
}
