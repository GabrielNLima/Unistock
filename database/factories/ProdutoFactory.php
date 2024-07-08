<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Fornecedor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
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
            'categoria' => $this->faker->unique()->word(),
            'dataProduto' => now(),
            'quantidade' => 100,
            'precoUnitario' => 10.50,
            'id_fornecedor' => Fornecedor::pluck('id')->random()
        ];
    }
}
