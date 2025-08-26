<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
Route::get('/produtos', [TarefaController::class, 'produtos'])->name('produtos.index');
Route::get('/contatos', [TarefaController::class, 'contatos'])->name('contatos.index');