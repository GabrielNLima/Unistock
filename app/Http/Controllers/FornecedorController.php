<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFornecedorFormRequest;
use App\Services\FornecedorService;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    protected $fornecedorService;

    public function __construct(FornecedorService $fornecedorService){
        $this->fornecedorService = $fornecedorService;
    }

    public function index(){

        $fornecedores = $this->fornecedorService->getAll();
        //$fornecedores = Fornecedor::get();
        return inertia('Fornecedores/Index', [
            'fornecedores' => $fornecedores]);
        // return view ('fornecedor.overview', compact('fornecedores'));
    }

    public function create(){
        return view ('fornecedor.create');
    }

    public function store(StoreUpdateFornecedorFormRequest $request){

        $this->fornecedorService->store($request);
        //Fornecedor::create($request->all());

        return redirect()->route('fornecedor.index');
    }

    public function show($id){

        if (!($fornecedor = $this->fornecedorService->getById($id)))
            return redirect()-> route('fornecedor.index');

        return view ('fornecedor.show', compact('fornecedor'));
    }

    public function edit($id){

        if (!($fornecedor = $this->fornecedorService->getById($id)))
            return redirect()-> route('fornecedor.index');

        return view('fornecedor.edit', compact('fornecedor'));
    }

    public function update(Request $request, $id){

        if (!($fornecedor = $this->fornecedorService->getById($id)))
            return redirect()-> route('fornecedor.index');

        //$fornecedor->update($request->all());
        $this->fornecedorService->update($request, $fornecedor);
        return redirect()->route('fornecedor.index');
    }

    public function destroy($id){

        // if (!$fornecedor = Fornecedor::find($id))
        //     return redirect()-> route('fornecedor.index');
        if (!($fornecedor = $this->fornecedorService->getById($id)))
            return redirect()-> route('fornecedor.index');

        $this->fornecedorService->destroy($fornecedor);

        return redirect()->route('fornecedor.index');
    }
}

?>
