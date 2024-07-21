<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:12'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:30', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'o campo nome é obrigatório',
            'name.string' => 'o campo deve conter somente letras',
            'name.max' => 'o campo deve conter no máximo 12 caracteres',

            'email.required' => 'o campo email é obrigatório',
            'email.lowercase' => 'o campo email não segue as especificações necessárias',
            'email.email' => 'o campo email deve ser do tipo email',
            'email.max' => 'o campo deve conter no máximo 30 caracteres',
            'email.unique' => 'esse email já está em uso',
        ];
    }
}
