<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SaidaService;
use App\Services\ProdutoService;

class SaidaController extends Controller
{
    protected $saidaService;
    protected $produtoService;

    public function __construct(SaidaService $saidaService, ProdutoService $produtoService){
        $this->saidaService = $saidaService;
        $this->produtoService = $produtoService;
    }

    public function index(){
        $saidas = $this->saidaService->getAll();
        $produtos = $this->produtoService->getAll();
        return inertia('Saidas/Index', ['saidas' => $saidas, 'produtos' => $produtos]);
    }

    public function store(Request $request){
        $this->saidaService->store($request);

        return redirect()->route('saida.index');
    }

    public function update(Request $request, $id){
        if (!($saida = $this->saidaService->getById($id)))
            return redirect()-> route('saida.index');

        $this->saidaService->update($request, $saida);

        return redirect()->route('saida.index');
    }

    public function destroy($id){
        if (!($saida = $this->saidaService->getById($id)))
            return redirect()-> route('saida.index');

        $this->saidaService->destroy($saida);

        return redirect()->route('saida.index');
    }
}
