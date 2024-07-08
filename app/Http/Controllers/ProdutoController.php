<?php

namespace App\Http\Controllers;

// use App\Models\Produto;
// use App\Models\Fornecedor;
use App\Http\Requests\StoreUpdateProdutoFormRequest;
use App\Services\ProdutoService;
use App\Services\FornecedorService;
use Illuminate\Http\Request;


class ProdutoController extends Controller
{
    protected $produtoService;
    protected $fornecedorService;

    public function __construct(ProdutoService $produtoService, FornecedorService $fornecedorService) {
        $this->produtoService = $produtoService;
        $this->fornecedorService = $fornecedorService;
    }

    public function index(){
        //$produtos = Produto::get();
        $produtos = $this->produtoService->getAll();
        $fornecedores = $this->fornecedorService->getAll();
        return inertia('Produtos/Index', ['produtos' => $produtos, 'fornecedores' => $fornecedores]);
    }

    public function create(){
        //$fornecedores = Fornecedor::get();
        $fornecedores = $this->fornecedorService->getAll();
        return view ('produto.create', compact('fornecedores'));
    }

    public function store(StoreUpdateProdutoFormRequest $request){
        // $data = $request->all();
        // $fornecedor = Fornecedor::where('name', $request->fornecedor)->first();
        // $data['fornecedor'] = $fornecedor->id;
        // Produto::create($data);
        $this->produtoService->store($request);

        return redirect()->route('produto.index');
    }

    public function show($id){
        if (!($produto = $this->produtoService->getById($id)))
            return redirect()-> route('produto.index');

        //$fornecedor = Fornecedor::find($produto->fornecedor);
        $fornecedor = $this->fornecedorService->getById($produto->fornecedor);

        return view ('produto.show', compact('produto'), compact('fornecedor'));
    }

    public function edit($id){
        if (!($produto = $this->produtoService->getById($id)))
            return redirect()-> route('produto.index');

        //$fornecedor = Fornecedor::get();
        $fornecedor = $this->fornecedorService->getAll();

        return view('produto.edit', compact('produto'), compact('fornecedor'));
    }

    public function update(Request $request, $id){
        if (!($produto = $this->produtoService->getById($id)))
            return redirect()-> route('produto.index');

        // $data = $request->all();
        // $fornecedor = Fornecedor::where('name', $request->fornecedor)->first();
        // $data['fornecedor'] = $fornecedor->id;
        // $produto->update($data);
        $this->produtoService->update($request, $produto);

        return redirect()->route('produto.index');
    }

    public function destroy($id){
        if (!($produto = $this->produtoService->getById($id)))
            return redirect()-> route('produto.index');

        //$produto->delete();
        $this->produtoService->destroy($produto);

        return redirect()->route('produto.index');
    }
}

?>
