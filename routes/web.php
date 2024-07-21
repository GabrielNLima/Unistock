<?php

use App\Http\Controllers\{
    EntradaController,
    SaidaController,
    FornecedorController,
    ProdutoController,
    ProfileController,
};
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rotas Protegidas

Route::middleware('auth')->group(function () {
    Route::controller(FornecedorController::class)->group(function(){
        Route::get('/fornecedores', 'index')-> name('fornecedor.index');
        Route::post('/fornecedores', 'store')-> name('fornecedor.store');
        Route::put('/fornecedores/{id}', 'update')-> name('fornecedor.update');
        Route::delete('/fornecedores/{id}', 'destroy')-> name('fornecedor.destroy');
    });

    Route::controller(ProdutoController::class)->group(function(){
        Route::get('/produtos', 'index')-> name('produto.index');
        Route::post('/produtos', 'store')-> name('produto.store');
        Route::put('/produtos/{id}', 'update')-> name('produto.update');
        Route::delete('/produtos/{id}', 'destroy')-> name('produto.destroy');

    });

    Route::controller(EntradaController::class)->group(function(){
        Route::get('/entradas', 'index')-> name('entrada.index');
        Route::post('/entradas', 'store')-> name('entrada.store');
        Route::put('/entradas/{id}', 'update')-> name('entradas.update');
        Route::delete('/entradas/{id}', 'destroy')-> name('entrada.destroy');
    });

    Route::controller(SaidaController::class)->group(function(){
        Route::get('/saidas', 'index')-> name('saida.index');
        Route::post('/saidas', 'store')-> name('saida.store');
        Route::put('/saidas/{id}', 'update')-> name('saida.update');
        Route::delete('/saidas/{id}', 'destroy')-> name('saida.destroy');
    });

    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile','edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

//Rotas Desprotegidas

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
