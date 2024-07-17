<?php

namespace App\Http\Requests;

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
            'codigo' => 'required|unique:saidas|min:0',
            'quantidadeProduto' => 'required|integer|min:0',
            'valorTotal' => 'required|decimal:0,2|min:0.00',
            'dataSaida' => 'required|date|before or equal:today|',
            'id_produto' => 'required|integer|min:0',
        ];
    }
}
