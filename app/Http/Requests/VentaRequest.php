<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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
            'cli_id' => 'nullable|exists:Cliente,cli_id',
            'ven_total' => 'required|numeric|min:0.01',
            'ven_fecha' => 'required|date',
            'ven_cuotas' => 'required|integer|min:1',
            'form_pago_id' => 'required|exists:FormaPago,form_pago_id',
        ];
    }
}
