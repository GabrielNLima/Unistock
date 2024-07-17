<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'idUsuario' => 'required|unique:users|integer|min:0',
            'password' => 'required|min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'idUsuario.required' => 'o campo ID é obrigatório',
            'idUsuario.unique' => 'já existe um usuário com esse ID',
            'idUsuario.integer' => 'o campo pode conter somente inteiros',
            'idUsuario.min' => 'o campo deve conter somente valores positivos',
            'password.required' => 'o campo senha é obrigatório',
            'password.min' => 'o campo deve conter no mínimo 5 caracteres',
        ];
    }
}
