<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{

    public function index()
    {
        return view('festa');
    }
    public function listarClientes()
    {
        // Buscar todos os registros da tabela cadastros
        $clientes = DB::select("SELECT * FROM cadastros ORDER BY created_at DESC");
    
        // Retornar para a view
        return view('admin.clientes', compact('clientes'));
    }
    

    public function store(Request $request){
        $estilos = $request -> input('estilos') ? implode(',' , $request -> input('estilos') ): null;

        DB::insert("INSERT INTO cadastros (nome,
         email,telefone, idade,
         estilos, newsletter, created_at)
         VALUES (?,?,?,?,?,?,now()) ", 
         [
         $request->input('nome'),
         $request->input('email'),
         $request->input('telefone'),
         $request->input('idade'),
         $estilos,
         $request->has('newsletter') ? 1 : 0
         ]
         );

         return redirect()->back()->with('sucess','Cadastro realizado com sucesso!');

    }


    
}
