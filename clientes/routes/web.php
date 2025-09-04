<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioSimplesController;


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