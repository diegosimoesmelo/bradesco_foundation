<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = [
            [
                'id' => 1, 
                'titulo' => 'Estudar Laravel', 
                'descricao' => 'Aprender sobre Blade e foreach',
                'concluida' => false,
                'prioridade' => 'alta',
                'data_criacao' => '2024-01-15'
            ],
            [
                'id' => 2, 
                'titulo' => 'Fazer compras', 
                'descricao' => 'Comprar ingredientes para o jantar',
                'concluida' => true,
                'prioridade' => 'media',
                'data_criacao' => '2024-01-14'
            ],
            [
                'id' => 3, 
                'titulo' => 'Exercitar-se', 
                'descricao' => 'Corrida no parque pela manhã',
                'concluida' => false,
                'prioridade' => 'alta',
                'data_criacao' => '2024-01-16'
            ],
            [
                'id' => 4, 
                'titulo' => 'Ler livro', 
                'descricao' => 'Continuar lendo "Clean Code"',
                'concluida' => true,
                'prioridade' => 'baixa',
                'data_criacao' => '2024-01-13'
            ],
            [
                'id' => 5, 
                'titulo' => 'Reunião de trabalho', 
                'descricao' => 'Reunião semanal da equipe',
                'concluida' => false,
                'prioridade' => 'alta',
                'data_criacao' => '2024-01-17'
            ]
        ];

        $totalTarefas = count($tarefas);
        $tarefasConcluidas = collect($tarefas)->where('concluida', true)->count();
        $tarefasPendentes = $totalTarefas - $tarefasConcluidas;

        return view('tarefas.index', compact('tarefas', 'totalTarefas', 'tarefasConcluidas', 'tarefasPendentes'));
    }

    public function produtos()
    {
        $produtos = [
            [
                'id' => 1,
                'nome' => 'Notebook Dell',
                'preco' => 2500.00,
                'categoria' => 'Eletrônicos',
                'estoque' => 10,
                'descricao' => 'Notebook para trabalho e estudos'
            ],
            [
                'id' => 2,
                'nome' => 'Mouse Logitech',
                'preco' => 50.00,
                'categoria' => 'Periféricos',
                'estoque' => 25,
                'descricao' => 'Mouse sem fio com alta precisão'
            ],
            [
                'id' => 3,
                'nome' => 'Teclado Mecânico',
                'preco' => 150.00,
                'categoria' => 'Periféricos',
                'estoque' => 15,
                'descricao' => 'Teclado mecânico para gamers'
            ],
            [
                'id' => 4,
                'nome' => 'Monitor 24"',
                'preco' => 800.00,
                'categoria' => 'Eletrônicos',
                'estoque' => 8,
                'descricao' => 'Monitor Full HD para trabalho'
            ],
            [
                'id' => 5,
                'nome' => 'Smartphone Samsung',
                'preco' => 1200.00,
                'categoria' => 'Eletrônicos',
                'estoque' => 0,
                'descricao' => 'Smartphone com câmera profissional'
            ]
        ];

        // Agrupar produtos por categoria
        $produtosPorCategoria = collect($produtos)->groupBy('categoria');

        return view('produtos.index', compact('produtos', 'produtosPorCategoria'));
    }

    public function contatos()
    {
        $contatos = [
            [
                'id' => 1,
                'nome' => 'João Silva',
                'email' => 'joao@email.com',
                'telefone' => '11999999999',
                'empresa' => 'Tech Solutions',
                'cargo' => 'Desenvolvedor'
            ],
            [
                'id' => 2,
                'nome' => 'Maria Santos',
                'email' => 'maria@email.com',
                'telefone' => '11888888888',
                'empresa' => 'Design Studio',
                'cargo' => 'Designer'
            ],
            [
                'id' => 3,
                'nome' => 'Pedro Oliveira',
                'email' => 'pedro@email.com',
                'telefone' => '11777777777',
                'empresa' => 'Marketing Pro',
                'cargo' => 'Gerente'
            ]
        ];

        return view('contatos.index', compact('contatos'));
    }
}