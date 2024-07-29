<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFornecedorFormRequest extends FormRequest
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
            'name' => 'required|string|max:25|min:3',
            'codigo' => 'required|integer|unique:fornecedors|min:0',
            'cnpj' => [
                'required',
                'string',
                'size:18',
                'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/'
            ],
            'dataFornecedor' => 'required|date|before_or_equal:today|',
            'telefone' => [
                'required',
                'string',
                'size:15',
                // 'max:11',
                'regex:/^\(?\d{2}\)?[\s-]?\d{4,5}[\s-]?\d{4}$/'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome não pode ter mais que 25 caracteres.',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres.',

            'codigo.required' => 'O campo código é obrigatório.',
            'codigo.integer' => 'O campo código deve ser um número inteiro.',
            'codigo.unique' => 'O código já está em uso.',
            'codigo.min' => 'O valor do código deve ser no mínimo 0.',

            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.string' => 'O campo CNPJ deve ser uma string.',
            'cnpj.size' => 'O campo CNPJ deve ter exatamente 18 caracteres.',
            'cnpj.regex' => 'O campo CNPJ deve estar no formato 00.000.000/0000-00.',


            'dataFornecedor.required' => 'O campo data do fornecedor é obrigatório.',
            'dataFornecedor.date' => 'O campo data do fornecedor deve ser uma data válida.',
            'dataFornecedor.before_or_equal' => 'A data do fornecedor não pode ser futura.',

            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string' => 'O campo telefone deve ser uma string.',
            'telefone.size' => 'O campo telefone deve ter exatamente 15 caracteres.',
            // 'telefone.max' => 'O campo telefone deve ter no máximo 11 caracteres.',
            'telefone.regex' => 'O campo telefone deve estar no formato (00) 0000-0000 ou (00) 00000-0000.',
        ];
    }
}
