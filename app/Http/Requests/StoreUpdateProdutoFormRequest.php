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
            'codigo' => 'required|unique:produtos|',
            'categoria' => 'required|string|max:25|min:3',
            'dataProduto' => 'required|date|before or equal:today|',
            'quantidade' => 'required|integer|min:0',
            'precoUnitario' => 'required|decimal:0,2|min:0.00',
            'id_fornecedor' => 'required|integer|min:0',
        ];
    }
}
