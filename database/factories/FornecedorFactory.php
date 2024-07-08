<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'codigo' => Str::random(2),
            'cnpj' => '12.345.678/0001-00',
            'dataFornecedor' => now(),
            'telefone' => '4299998-0842',
        ];
    }
}
