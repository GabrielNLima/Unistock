<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::controller(UserController::class)-> group(function(){
    Route::get('/dashboard', 'dashboard')-> name('dashboard');
    Route::get('/', 'login')-> name('user.login');
    Route::get('/register', 'register')-> name('user.register');
    Route::get('users', 'index')->name('user.index');
    Route::post('/register', 'store')-> name('user.store');
    Route::post('/login', 'validates')-> name('user.validate');
});

Route::controller(FornecedorController::class)->group(function(){
    Route::get('/fornecedores', 'index')-> name('fornecedor.index');
    Route::get('/fornecedores/{id}/edit', 'edit')-> name('fornecedor.edit');
    Route::get('/fornecedores/{id}', 'show')-> name('fornecedor.show');
    Route::get('/fornecedores/create', 'create')-> name('fornecedor.create');
    Route::post('/fornecedores', 'store')-> name('fornecedor.store');
    Route::put('/fornecedores/{id}', 'update')-> name('fornecedor.update');
    Route::delete('/fornecedores/{id}', 'destroy')-> name('fornecedor.destroy');
});

Route::controller(ProdutoController::class)->group(function(){
    Route::get('/produtos', 'index')-> name('produto.index');
    Route::get('/produtos/{id}/edit', 'edit')-> name('produto.edit');
    Route::get('/produto/{id}', 'show')-> name('produto.show');
    Route::get('/produtos/create', 'create')-> name('produto.create');
    Route::post('/produtos', 'store')-> name('produto.store');
    Route::put('/produtos/{id}', 'update')-> name('produto.update');
    Route::delete('/produtos/{id}', 'destroy')-> name('produto.destroy');

});
