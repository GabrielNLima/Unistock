<?php

namespace App\Http\Requests;

use App\Models\Produto;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSaidaFormRequest extends FormRequest
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
            'quantidadeProduto' => ['required', 'integer', 'min:1', function ($attribute, $value, $fail) {
                $produto = Produto::find($this->id_produto);
                if ($produto && $value > $produto->quantidade) {
                    $fail("A quantidade de saída não pode ser maior que a quantidade em estoque: {$produto->quantidade}");
                }
            }],
            'valorTotal' => 'required|decimal:0,2|min:0.00',
            'dataSaida' => 'required|date|before_or_equal:today|',
            'id_produto' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'O campo código é obrigatório.',
            'codigo.numeric' => 'O campo código deve ser um número.',
            'codigo.unique' => 'O código já está em uso.',
            'codigo.min' => 'O valor do código deve ser no mínimo 0.',
            'quantidadeProduto.required' => 'O campo quantidade de produto é obrigatório.',
            'quantidadeProduto.integer' => 'A quantidade de produto deve ser um número inteiro.',
            'quantidadeProduto.min' => 'A quantidade de produto deve ser no mínimo 1.',
            'valorTotal.required' => 'O campo valor total é obrigatório.',
            'valorTotal.decimal' => 'O valor total deve ser um número decimal com até 2 casas decimais.',
            'valorTotal.min' => 'O valor total deve ser no mínimo 0.00.',
            'dataSaida.required' => 'O campo data de saída é obrigatório.',
            'dataSaida.date' => 'O campo data de saída deve ser uma data válida.',
            'dataSaida.before_or_equal' => 'A data de saída não pode ser futura.',
            'id_produto.required' => 'O campo produto é obrigatório.',
            'id_produto.integer' => 'O ID do produto deve ser um número inteiro.',
            'id_produto.min' => 'O valor do ID do produto deve ser no mínimo 0.',
        ];
    }
}
