@extends('layouts.app')

@section('title', 'Lista de Contatos')

@section('content')
<h1><i class="fas fa-address-book"></i> Lista de Contatos</h1>

<div class="row">
    @foreach($contatos as $contato)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold">
                                    {{ strtoupper(substr($contato['nome'], 0, 1)) }}
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title mb-1">{{ $contato['nome'] }}</h5>
                            <p class="card-text mb-1">
                                <i class="fas fa-envelope"></i> {{ $contato['email'] }}
                            </p>
                            <p class="card-text mb-1">
                                <i class="fas fa-phone"></i> {{ $contato['telefone'] }}
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="fas fa-building"></i> {{ $contato['empresa'] }} - {{ $contato['cargo'] }}
                                </small>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="badge bg-info">{{ $loop->iteration }}</span>
                        </div>
                    </div>
                    
                    @if($loop->odd)
                        <div class="mt-2">
                            <small class="text-muted"><i class="fas fa-info"></i> Posição ímpar</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        @if($loop->iteration % 2 == 0)
            </div><div class="row">
        @endif
    @endforeach
</div>

<div class="alert alert-info mt-4">
    <h6><i class="fas fa-info-circle"></i> Informações do Loop:</h6>
    <p>Esta página mostra {{ count($contatos) }} contatos usando o @foreach do Laravel.</p>
    <p>Cada contato exibe informações sobre a posição no loop e outras funcionalidades.</p>
</div>
@endsection