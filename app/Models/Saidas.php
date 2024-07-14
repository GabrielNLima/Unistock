<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saidas extends Model
{
    use HasFactory;

    protected $filable = [
        'codigo',
        'nomeProduto',
        'quantidadeProduto',
        'custoUnitario',
        'valorTotal',
        'dataSaida',
        'idProduto',
    ];
}
