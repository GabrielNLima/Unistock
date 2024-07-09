<?php

namespace App\Services;

use App\Http\Requests\StoreUpdateFornecedorFormRequest;
use App\Models\Fornecedor;
use Exception;
use Illuminate\Http\Request;

class FornecedorService
{

    protected $fornecedor;

    public function __construct(Fornecedor $fornecedor) {
        $this->fornecedor = $fornecedor;
    }

    public function getAll() {
        return Fornecedor::orderBy('id')->get();
    }

    public function store(StoreUpdateFornecedorFormRequest $request){
        Fornecedor::create($request->all());
    }

    public function getById($id) {
        $fornecedor = Fornecedor::find($id);
        return $fornecedor;
    }

    public function update(Request $request, Fornecedor $fornecedor){
        $fornecedor->update($request->all());
    }

    public function destroy(Fornecedor $fornecedor){
        $fornecedor->delete();
    }

}
