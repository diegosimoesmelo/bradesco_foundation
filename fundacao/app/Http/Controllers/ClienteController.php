<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = DB::select('SELECT * FROM clientes ORDER BY nome ASC');
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:2',
            'cep' => 'nullable|string|max:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verificar se email já existe
        $emailExists = DB::select('SELECT id FROM clientes WHERE email = ?', [$request->email]);
        if (!empty($emailExists)) {
            return redirect()->back()
                ->withErrors(['email' => 'Este email já está cadastrado.'])
                ->withInput();
        }

        try {
            DB::insert('INSERT INTO clientes (nome, email, telefone, endereco, cidade, estado, cep, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
                $request->nome,
                $request->email,
                $request->telefone,
                $request->endereco,
                $request->cidade,
                $request->estado,
                $request->cep
            ]);

            return redirect()->route('clientes.index')
                ->with('success', 'Cliente cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Erro ao cadastrar cliente: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = DB::select('SELECT * FROM clientes WHERE id = ?', [$id]);
        
        if (empty($cliente)) {
            return redirect()->route('clientes.index')
                ->withErrors(['error' => 'Cliente não encontrado.']);
        }

        $cliente = $cliente[0];
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = DB::select('SELECT * FROM clientes WHERE id = ?', [$id]);
        
        if (empty($cliente)) {
            return redirect()->route('clientes.index')
                ->withErrors(['error' => 'Cliente não encontrado.']);
        }

        $cliente = $cliente[0];
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:2',
            'cep' => 'nullable|string|max:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verificar se cliente existe
        $cliente = DB::select('SELECT * FROM clientes WHERE id = ?', [$id]);
        if (empty($cliente)) {
            return redirect()->route('clientes.index')
                ->withErrors(['error' => 'Cliente não encontrado.']);
        }

        // Verificar se email já existe em outro cliente
        $emailExists = DB::select('SELECT id FROM clientes WHERE email = ? AND id != ?', [$request->email, $id]);
        if (!empty($emailExists)) {
            return redirect()->back()
                ->withErrors(['email' => 'Este email já está cadastrado para outro cliente.'])
                ->withInput();
        }

        try {
            DB::update('UPDATE clientes SET nome = ?, email = ?, telefone = ?, endereco = ?, cidade = ?, estado = ?, cep = ?, updated_at = NOW() WHERE id = ?', [
                $request->nome,
                $request->email,
                $request->telefone,
                $request->endereco,
                $request->cidade,
                $request->estado,
                $request->cep,
                $id
            ]);

            return redirect()->route('clientes.index')
                ->with('success', 'Cliente atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Erro ao atualizar cliente: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $affected = DB::delete('DELETE FROM clientes WHERE id = ?', [$id]);
            
            if ($affected > 0) {
                return redirect()->route('clientes.index')
                    ->with('success', 'Cliente excluído com sucesso!');
            } else {
                return redirect()->route('clientes.index')
                    ->withErrors(['error' => 'Cliente não encontrado.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('clientes.index')
                ->withErrors(['error' => 'Erro ao excluir cliente: ' . $e->getMessage()]);
        }
    }
}
// -- Script SQL para criar a tabela de clientes
// CREATE TABLE clientes (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     nome VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL UNIQUE,
//     telefone VARCHAR(20),
//     endereco TEXT,
//     cidade VARCHAR(100),
//     estado VARCHAR(2),
//     cep VARCHAR(10),
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );

// -- Inserir alguns dados de exemplo (opcional)
// INSERT INTO clientes (nome, email, telefone, endereco, cidade, estado, cep) VALUES
// ('João Silva', 'joao@email.com', '(11) 99999-9999', 'Rua das Flores, 123', 'São Paulo', 'SP', '01234-567'),
// ('Maria Santos', 'maria@email.com', '(21) 88888-8888', 'Av. Principal, 456', 'Rio de Janeiro', 'RJ', '20123-456'),
// ('Pedro Oliveira', 'pedro@email.com', '(31) 77777-7777', 'Rua Central, 789', 'Belo Horizonte', 'MG', '30123-789');
