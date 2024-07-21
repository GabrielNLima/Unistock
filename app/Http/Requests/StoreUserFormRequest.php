<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

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
            // 'idUsuario' => 'required|unique:users|integer|min:0',
            // 'password' => 'required|min:5',
            'name' => 'required|string|max:12',
            'email' => 'required|string|lowercase|email|max:30|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            // 'idUsuario.required' => 'o campo ID é obrigatório',
            // 'idUsuario.unique' => 'já existe um usuário com esse ID',
            // 'idUsuario.integer' => 'o campo pode conter somente inteiros',
            // 'idUsuario.min' => 'o campo deve conter somente valores positivos',
            'name.required' => 'o campo nome é obrigatório',
            'name.string' => 'o campo deve conter somente letras',
            'name.max' => 'o campo deve conter no máximo 12 caracteres',

            'email.required' => 'o campo email é obrigatório',
            'email.lowercase' => 'o campo email não segue as especificações necessárias',
            'email.email' => 'o campo email deve ser do tipo email',
            'email.max' => 'o campo deve conter no máximo 30 caracteres',
            'email.unique' => 'esse email já está em uso',

            'password.required' => 'o campo senha é obrigatório',
            'password.confirmed' => 'o campo de confirmação de senha não é compatível com a senha',
            'password_confirmation.required' => 'confirme sua senha',
        ];
    }
}
