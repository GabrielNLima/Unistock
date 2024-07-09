<?php

namespace App\Services;

use App\Http\Requests\StoreUpdateProdutoFormRequest;
use App\Models\Produto;
use App\Models\Fornecedor;
use Exception;
use Illuminate\Http\Request;

class ProdutoService
{

    protected $produto;

    public function __construct(Produto $produto) {
        $this->produto = $produto;
    }

    public function getAll() {
        return Produto::get();
    }

    public function store(StoreUpdateProdutoFormRequest $request){
        // $data = $request->all();
        // $fornecedor = Fornecedor::where('name', $request->fornecedor)->first();
        // $data['fornecedor'] = $fornecedor->id;

        Produto::create($request->all());
    }

    public function getById($id) {
        $produto = Produto::find($id);
        return $produto;
    }

    public function update(Request $request, Produto $produto){
        $produto->update($request->all());
    }

    public function destroy(Produto $produto){
        $produto->delete();
    }

}
