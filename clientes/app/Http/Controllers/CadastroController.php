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

    public function listarClientes(Request $request)
    {
        // Verificar se está logado
        if (!session('admin_user_id')) {
            return redirect()->route('admin.login.form');
        }

        $q = $request->get('q');
        
        if ($q) {
            // Buscar com filtro na tabela cadastros
            $clientes = DB::select("
                SELECT id, nome, email, telefone, idade, estilos, newsletter, created_at, updated_at 
                FROM cadastros 
                WHERE nome LIKE ? OR email LIKE ? 
                ORDER BY created_at DESC
            ", [
                '%' . $q . '%',
                '%' . $q . '%'
            ]);
        } else {
            // Buscar todos os registros da tabela cadastros
            $clientes = DB::select("
                SELECT id, nome, email, telefone, idade, estilos, newsletter, created_at, updated_at 
                FROM cadastros 
                ORDER BY created_at DESC
            ");
        }

        // Converter objetos para array para facilitar manipulação na view
        $clientes = array_map(function($cliente) {
            return (object) [
                'id' => $cliente->id,
                'nome' => $cliente->nome,
                'email' => $cliente->email,
                'telefone' => $cliente->telefone,
                'idade' => $cliente->idade,
                'estilos' => $cliente->estilos,
                'newsletter' => (bool) $cliente->newsletter,
                'created_at' => $cliente->created_at,
                'updated_at' => $cliente->updated_at
            ];
        }, $clientes);
    
        // Retornar para a view
        return view('admin.clientes', compact('clientes', 'q'));
    }

    public function store(Request $request)
    {
        // Pega os estilos musicais (checkbox)
        $estilos = $request->input('estilos') ? implode(',', $request->input('estilos')) : null;


        // SQL puro
        DB::insert(
            "INSERT INTO cadastros (nome, email, telefone, idade, estilos, newsletter, created_at)
             VALUES (?, ?, ?, ?, ?, ?, NOW())",
            [
                $request->input('nome'),
                $request->input('email'),
                $request->input('telefone'),
                $request->input('idade'),
                $estilos,
                $request->has('newsletter') ? 1 : 0,
            ]
        );


        return redirect()->back()->with('success', 'Cadastro realizado com sucesso!');
    }

}