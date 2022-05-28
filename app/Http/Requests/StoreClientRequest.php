<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'required|min:2',
            'phone' => 'required|min:7',
            'address' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo nome é obrigatório',
            'name.min' => 'Campo nome deve ter no mínimo :min caracteres',

            'phone.required' => 'Campo telefone é obrigatório',
            'phone.min' => 'Campo telefone deve ter no mínimo :min caracteres',

            'address.required' => 'Campo endereço é obrigatório',
            'address.min' => 'Campo endereço deve ter no mínimo :min caracteres',
        ];
    }
}
