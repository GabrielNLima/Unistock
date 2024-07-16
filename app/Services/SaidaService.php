<?php

namespace App\Services;

use App\Models\Saida;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SaidaService
{

    public function getAll() {
        return Saida::orderBy('id')->get();
    }

    public function store(Request $request){
        Saida::create($request->all());
    }

    public function getById($id) {
        $saida = Saida::find($id);
        return $saida;
    }

    public function update(Request $request, Saida $saida){
        $saida->update($request->all());
    }

    public function destroy(Saida $saida){
        $saida->delete();
    }

    public function filter(Builder $query){

    }
}
