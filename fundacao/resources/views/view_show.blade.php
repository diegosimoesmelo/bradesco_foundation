{{-- View: resources/views/clientes/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-user"></i> Detalhes do Cliente</h1>
    <div>
        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5>Informações Pessoais</h5>
                <table class="table table-borderless">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nome:</strong></td>
                        <td>{{ $cliente->nome }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $cliente->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Telefone:</strong></td>
                        <td>{{ $cliente->telefone_formatado ?? 'Não informado' }}</td>
                    </tr>
                    <tr>
                        <td><strong>CPF:</strong></td>
                        <td>{{ $cliente->cpf_formatado }}</td>
                    </tr>
                </table>
            </div>
            
            <div class="col-md-6">
                <h5>Endereço</h5>
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Endereço:</strong></td>
                        <td>{{ $cliente->endereco ?? 'Não informado' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Cidade:</strong></td>
                        <td>{{ $cliente->cidade ?? 'Não informado' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Estado:</strong></td>
                        <td>{{ $cliente->estado ?? 'Não informado' }}</td>
                    </tr>
                    <tr>
                        <td><strong>CEP:</strong></td>
                        <td>{{ $cliente->cep ?? 'Não informado' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            <div class="col-md-6">
                <small class="text-muted">
                    <strong>Cadastrado em:</strong> {{ $cliente->created_at->format('d/m/Y H:i') }}
                </small>
            </div>
            <div class="col-md-6">
                <small class="text-muted">
                    <strong>Última atualização:</strong> {{ $cliente->updated_at->format('d/m/Y H:i') }}
                </small>
            </div>
        </div>
    </div>
</div>
@endsection
