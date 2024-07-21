<?php

namespace App\Services;

use App\Http\Requests\StoreUpdateEntradaFormRequest;
use App\Models\Entrada;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EntradaService
{
    public function getAll() {
        return Entrada::orderBy('id')->get();
    }

    public function store(StoreUpdateEntradaFormRequest $request){
        Entrada::create($request->all());

        $produto = Produto::findOrFail($request->id_produto);
        $produto->quantidade += $request->quantidadeProduto;
        $produto->save();
    }

    public function getById($id) {
        $entrada = Entrada::find($id);
        return $entrada;
    }

    public function update(Request $request, Entrada $entrada){
        $produto = Produto::findOrFail($request->id_produto);
        $produto->quantidade += $entrada->quantidadeProduto;
        $produto->quantidade -= $request->quantidadeProduto;
        $produto->save();

        $entrada->update($request->all());
    }

    public function destroy(Entrada $entrada){
        $produto = Produto::findOrFail($entrada->id_produto);
        $produto->quantidade -= $entrada->quantidadeProduto;
        $produto->save();

        $entrada->delete();
    }

    public function filter(Builder $query){

    }
}
