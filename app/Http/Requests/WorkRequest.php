<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    /**
    * paid
    * freight_value
    * price
     */
    public function rules()
    {
        return [
            'date' => 'required',
            'material' => 'required',
            'place' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Data é obrigatório',
            'material.required' => 'Material é obrigatório',
            'place.required' => 'Lugar é obrigatório',
        ];
    }
}
