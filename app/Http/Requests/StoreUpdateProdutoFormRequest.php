<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoFormRequest extends FormRequest
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
            'codigo' => 'required|integer|unique:produtos|min:0',
            'categoria' => 'required|string|max:25|min:3',
            'dataProduto' => 'required|date|before_or_equal:today',
            'quantidade' => 'required|integer|min:0',
            'precoUnitario' => 'required|decimal:0,2|min:0.00',
            'id_fornecedor' => 'required|integer|min:0',
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

        'categoria.required' => 'O campo categoria é obrigatório.',
        'categoria.string' => 'O campo categoria deve ser uma string.',
        'categoria.max' => 'O campo categoria não pode ter mais que 25 caracteres.',
        'categoria.min' => 'O campo categoria deve ter no mínimo 3 caracteres.',

        'dataProduto.required' => 'O campo data do produto é obrigatório.',
        'dataProduto.date' => 'O campo data do produto deve ser uma data válida.',
        'dataProduto.before_or_equal' => 'A data do produto não pode ser futura.',

        'quantidade.required' => 'O campo quantidade é obrigatório.',
        'quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
        'quantidade.min' => 'A quantidade deve ser no mínimo 0.',

        'precoUnitario.required' => 'O campo preço unitário é obrigatório.',
        'precoUnitario.decimal' => 'O campo preço unitário deve ser um número decimal com até duas casas decimais.',
        'precoUnitario.min' => 'O preço unitário deve ser no mínimo 0.00.',

        'id_fornecedor.required' => 'O campo ID do fornecedor é obrigatório.',
        'id_fornecedor.integer' => 'O campo ID do fornecedor deve ser um número inteiro.',
        'id_fornecedor.min' => 'O ID do fornecedor deve ser no mínimo 0.',
    ];
}
}
