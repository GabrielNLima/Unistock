<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEntradaFormRequest extends FormRequest
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
            'codigo' => 'required|unique:saidas|numeric|min:0',
            'quantidadeProduto' => 'required|integer|min:0',
            'custoTotal' => 'required|decimal:0,2|min:0.00',
            'dataEntrada' => 'required|date|before_or_equal:today|',
            'id_produto' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'codigo.required' => 'O campo código é obrigatório.',
            'codigo.unique' => 'O código já está em uso.',
            'codigo.numeric' => 'O campo código deve ser um número.',
            'codigo.min' => 'O valor do código deve ser no mínimo 0.',

            'quantidadeProduto.required' => 'O campo quantidade de produto é obrigatório.',
            'quantidadeProduto.integer' => 'A quantidade de produto deve ser um número inteiro.',
            'quantidadeProduto.min' => 'A quantidade de produto deve ser no mínimo 0.',

            'custoTotal.required' => 'O campo custo total é obrigatório.',
            'custoTotal.numeric' => 'O custo total deve ser um número decimal.',
            'custoTotal.min' => 'O custo total deve ser no mínimo 0.00.',

            'dataEntrada.required' => 'O campo data de entrada é obrigatório.',
            'dataEntrada.date' => 'O campo data de entrada deve ser uma data válida.',
            'dataEntrada.before_or_equal' => 'A data de entrada não pode ser futura.',

            'id_produto.required' => 'O campo do produto é obrigatório.',
            'id_produto.integer' => 'O ID do produto deve ser um número inteiro.',
            'id_produto.min' => 'O valor do ID do produto deve ser no mínimo 0.',
        ];
    }
}
