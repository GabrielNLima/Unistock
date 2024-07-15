<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){
        $this->entradaService->store($request);

        return redirect()->route('entrada.index');
    }
}
