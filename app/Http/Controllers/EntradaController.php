<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEntradaFormRequest;
use Illuminate\Http\Request;
use App\Services\EntradaService;
use App\Services\ProdutoService;


class EntradaController extends Controller
{
    protected $entradaService;
    protected $produtoService;

    public function __construct(EntradaService $entradaService, ProdutoService $produtoService){
        $this->entradaService = $entradaService;
        $this->produtoService = $produtoService;
    }

    public function index(){
        $entradas = $this->entradaService->getAll();
        $produtos = $this->produtoService->getAll();
        return inertia('Entradas/Index', ['entradas' => $entradas, 'produtos' => $produtos]);
    }

    public function store(StoreUpdateEntradaFormRequest $request){
        $this->entradaService->store($request);

        return redirect()->route('entrada.index');
    }

    public function update(Request $request, $id){
        if (!($entrada = $this->entradaService->getById($id)))
            return redirect()-> route('entrada.index');

        $this->entradaService->update($request, $entrada);

        return redirect()->route('entrada.index');
    }

    public function destroy($id){
        if (!($entrada = $this->entradaService->getById($id)))
            return redirect()-> route('entrada.index');

        $this->entradaService->destroy($entrada);

        return redirect()->route('entrada.index');
    }
}
