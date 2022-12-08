<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAddressFormRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'cpf' => 'required|unique:users',
            'phone' => 'required|min:6|max:8',

            'endereco' => 'required|string|max:255|min:6',
            'number' => 'required|min:1',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:100',
            'estado' => 'required|min:2|max:2',
            'cep' => 'required|min:8|max:9'
        ];
    }
}
