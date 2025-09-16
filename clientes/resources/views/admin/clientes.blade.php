@extends('layout')

@section('title', 'Clientes Cadastrados')

@section('content')
<div class="container mt-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="mb-0">Clientes Cadastrados</h1>
        <div class="d-flex gap-2">
            @if(session('is_superadmin'))
                <a class="btn btn-outline-primary" href="{{ route('admin.users.create') }}">
                    <i class="fa-solid fa-user-plus me-1"></i>Novo Usuário
                </a>
            @endif
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="btn btn-outline-danger">
                    Sair ({{ session('admin_user_name') }})
                </button>
            </form>
        </div>
    </div>

    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif

    <form class="mb-3" method="GET" action="{{ route('admin.clientes') }}">
        <div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Buscar por nome ou e-mail" value="{{ $q ?? '' }}">
            <button class="btn btn-secondary">Buscar</button>
        </div>
    </form>

    @if(!empty($clientes) && count($clientes) > 0)
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Idade</th>
                        <th>Estilos</th>
                        <th>Newsletter</th>
                        <th>Cadastrado em</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->telefone }}</td>
                        <td>{{ $c->idade }}</td>
                        <td>{{ $c->estilos }}</td>
                        <td>{{ $c->newsletter ? 'Sim' : 'Não' }}</td>
                        <td>{{ $c->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Nenhum cliente cadastrado ainda.</div>
    @endif
</div>
@endsection


