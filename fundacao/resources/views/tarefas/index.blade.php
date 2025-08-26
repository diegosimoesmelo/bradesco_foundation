@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1><i class="fas fa-tasks"></i> Lista de Tarefas</h1>
        
        <!-- Estatísticas -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <h3>{{ $totalTarefas }}</h3>
                        <p>Total de Tarefas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h3>{{ $tarefasConcluidas }}</h3>
                        <p>Concluídas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white">
                    <div class="card-body text-center">
                        <h3>{{ $tarefasPendentes }}</h3>
                        <p>Pendentes</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de Tarefas -->
        @forelse($tarefas as $tarefa)
            <div class="card mb-3 prioridade-{{ $tarefa['prioridade'] }}">
                <div class="card-body {{ $tarefa['concluida'] ? 'tarefa-concluida' : '' }}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="card-title">
                                @if($tarefa['concluida'])
                                    <i class="fas fa-check-circle text-success"></i>
                                @else
                                    <i class="far fa-circle text-muted"></i>
                                @endif
                                {{ $tarefa['titulo'] }}
                            </h5>
                            <p class="card-text">{{ $tarefa['descricao'] }}</p>
                            <small class="text-muted">
                                Criada em: {{ date('d/m/Y', strtotime($tarefa['data_criacao'])) }}
                            </small>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-{{ $tarefa['prioridade'] == 'alta' ? 'danger' : ($tarefa['prioridade'] == 'media' ? 'warning' : 'success') }}">
                                {{ ucfirst($tarefa['prioridade']) }}
                            </span>
                            <br>
                            <small class="text-muted">Item #{{ $loop->iteration }}</small>
                        </div>
                    </div>
                    
                    @if($loop->first)
                        <div class="alert alert-info mt-2">
                            <i class="fas fa-info-circle"></i> Esta é a primeira tarefa da lista!
                        </div>
                    @endif
                    
                    @if($loop->last)
                        <div class="alert alert-secondary mt-2">
                            <i class="fas fa-flag-checkered"></i> Esta é a última tarefa da lista!
                        </div>
                    @endif
                </div>
            </div>
            
            @if(!$loop->last)
                <hr class="my-2">
            @endif
        @empty
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i>
                Nenhuma tarefa encontrada!
            </div>
        @endforelse
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-pie"></i> Resumo</h5>
            </div>
            <div class="card-body">
                <h6>Por Prioridade:</h6>
                @php
                    $prioridades = collect($tarefas)->groupBy('prioridade');
                @endphp
                
                @foreach($prioridades as $prioridade => $tarefasPrioridade)
                    <div class="mb-2">
                        <strong>{{ ucfirst($prioridade) }}:</strong> 
                        {{ count($tarefasPrioridade) }} 
                        @if(count($tarefasPrioridade) > 1) tarefas @else tarefa @endif
                    </div>
                @endforeach
                
                <hr>
                
                <h6>Progresso:</h6>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" 
                         style="width: {{ ($tarefasConcluidas / $totalTarefas) * 100 }}%">
                        {{ round(($tarefasConcluidas / $totalTarefas) * 100) }}%
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection