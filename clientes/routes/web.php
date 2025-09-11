<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioSimplesController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ItemController;


Route::get('/', function () {
    return redirect('/itens');
});


// Listar todos os itens
Route::get('/itens', [ItemController::class, 'index'])->name('itens.index');


// Exibir formulário de criação
Route::get('/itens/create', [ItemController::class, 'create'])->name('itens.create');


// Salvar novo item
Route::post('/itens', [ItemController::class, 'store'])->name('itens.store');


// Exibir um item específico
Route::get('/itens/{id}', [ItemController::class, 'show'])->name('itens.show');


// Exibir formulário de edição
Route::get('/itens/{id}/edit', [ItemController::class, 'edit'])->name('itens.edit');


// Atualizar item
Route::put('/itens/{id}', [ItemController::class, 'update'])->name('itens.update');


// Excluir item
Route::delete('/itens/{id}', [ItemController::class, 'destroy'])->name('itens.destroy');
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cadastro', [AuthController::class, 'showCadastroForm'])->name('cadastro');
    Route::post('/cadastro', [AuthController::class, 'cadastrar']);
});


Route::get('/cidades/nova', [CidadeController::class, 'create'])->name('cidades.create');
Route::post('/cidades', [CidadeController::class, 'store'])->name('cidades.store');




Route::get('/produtos/novo', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');


Route::get('/', function () {
    return view('cadastro');
})->name('usuarios.create'); // só exibe o formulário


 //paises do banco
  Route::get('/', [UsuarioSimplesController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioSimplesController::class, 'store'])->name('usuarios.store');

// Route::get('/', function () {
//     return redirect()->route('clientes.index');
// });

// // Rotas para CRUD de clientes
// Route::prefix('clientes')->name('clientes.')->group(function () {
//     Route::get('/', [ClienteController::class, 'index'])->name('index');
//     Route::get('/create', [ClienteController::class, 'create'])->name('create');
//     Route::post('/', [ClienteController::class, 'store'])->name('store');
//     // Adicione aqui as outras rotas conforme for implementando (show, edit, update, destroy)
// });

// Route::prefix('usuarios')->name('usuarios.')->group(function () {
//     Route::get('/', [UsuarioController::class, 'index'])->name('index');
//     Route::get('/create', [UsuarioController::class, 'create'])->name('create');
//     Route::post('/', [UsuarioController::class, 'store'])->name('store');
//     Route::get('/{id}', [UsuarioController::class, 'show'])->name('show');
//     Route::delete('/{id}', [UsuarioController::class, 'destroy'])->name('destroy');
// });