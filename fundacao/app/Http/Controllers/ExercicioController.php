<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExercicioController extends Controller
{
    public function exercicio1()
    {
        $itens = ['Produto 1', 'Produto 2', 'Produto 3'];
        return view('exercicio1', compact('itens'));
    }
}