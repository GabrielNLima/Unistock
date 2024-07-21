<?php

namespace App\Services;

use App\Http\Requests\StoreUpdateSaidaFormRequest;
use App\Models\Produto;
use App\Models\Saida;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SaidaService
{

    public function getAll() {
        return Saida::orderBy('id')->get();
    }

    public function store(StoreUpdateSaidaFormRequest $request){
        Saida::create($request->all());

        $produto = Produto::findOrFail($request->id_produto);
        $produto->quantidade -= $request->quantidadeProduto;
        $produto->save();
    }

    public function getById($id) {
        $saida = Saida::find($id);
        return $saida;
    }

    public function update(Request $request, Saida $saida){
        $produto = Produto::findOrFail($request->id_produto);
        $produto->quantidade += $saida->quantidadeProduto;
        $produto->quantidade -= $request->quantidadeProduto;
        $produto->save();
        $saida->update($request->all());
    }

    public function destroy(Saida $saida){
        $produto = Produto::findOrFail($saida->id_produto);
        $produto->quantidade += $saida->quantidadeProduto;
        $produto->save();

        $saida->delete();
    }

    public function filter(Builder $query){

    }
}
