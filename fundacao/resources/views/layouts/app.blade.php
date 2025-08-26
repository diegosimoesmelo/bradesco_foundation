<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Foreach Exercises')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .prioridade-alta { border-left: 4px solid #dc3545; }
        .prioridade-media { border-left: 4px solid #ffc107; }
        .prioridade-baixa { border-left: 4px solid #28a745; }
        .tarefa-concluida { opacity: 0.6; text-decoration: line-through; }
        .produto-sem-estoque { background-color: #f8f9fa; }
        .card-produto { transition: transform 0.2s; }
        .card-produto:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tarefas.index') }}">
                <i class="fas fa-code"></i> Laravel Foreach
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('tarefas.index') }}">Tarefas</a>
                <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
                <a class="nav-link" href="{{ route('contatos.index') }}">Contatos</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>