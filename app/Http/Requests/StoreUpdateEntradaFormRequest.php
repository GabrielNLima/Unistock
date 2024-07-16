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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'codigo' => 'required|unique:saidas|',
            'quantidadeProduto' => 'required|integer|min:0',
            'custoTotal' => 'required|decimal:0,2|min:0.00',
            'dataEntrada' => 'required|date|before or equal:today|',
            'id_produto' => 'required|integer|min:0',
        ];
    }
}
