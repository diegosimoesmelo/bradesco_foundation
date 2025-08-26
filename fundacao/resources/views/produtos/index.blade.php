@extends('layouts.app')

@section('title', 'Catálogo de Produtos')

@section('content')
<h1><i class="fas fa-shopping-cart"></i> Catálogo de Produtos</h1>

<!-- Produtos por Categoria -->
@foreach($produtosPorCategoria as $categoria => $produtos)
    <div class="mb-5">
        <h2 class="border-bottom pb-2">
            <i class="fas fa-tag"></i> {{ $categoria }}
            <span class="badge bg-secondary">{{ count($produtos) }} produtos</span>
        </h2>
        
        <div class="row">
            @foreach($produtos as $produto)
                <div class="col-md-4 mb-4">
                    <div class="card card-produto {{ $produto['estoque'] == 0 ? 'produto-sem-estoque' : '' }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $produto['nome'] }}
                                @if($produto['estoque'] == 0)
                                    <span class="badge bg-danger">Sem Estoque</span>
                                @endif
                            </h5>
                            <p class="card-text">{{ $produto['descricao'] }}</p>
                            <p class="card-text">
                                <strong>Preço: R$ {{ number_format($produto['preco'], 2, ',', '.') }}</strong>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Estoque: {{ $produto['estoque'] }} unidades
                                </small>
                            </p>
                            
                            @if($loop->parent->first && $loop->first)
                                <div class="alert alert-success p-2 mt-2">
                                    <small><i class="fas fa-star"></i> Produto em destaque!</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                @if($loop->iteration % 3 == 0 && !$loop->last)
                    </div><div class="row">
                @endif
            @endforeach
        </div>
        
        @if(!$loop->last)
            <hr class="my-5">
        @endif
    </div>
@endforeach

<!-- Resumo Geral -->
<div class="card mt-4">
    <div class="card-header">
        <h5><i class="fas fa-chart-bar"></i> Resumo do Estoque</h5>
    </div>
    <div class="card-body">
        @php
            $totalProdutos = count($produtos);
            $produtosSemEstoque = collect($produtos)->where('estoque', 0)->count();
            $valorTotalEstoque = collect($produtos)->sum(function($produto) {
                return $produto['preco'] * $produto['estoque'];
            });
        @endphp
        
        <div class="row">
            <div class="col-md-3">
                <strong>Total de Produtos:</strong> {{ $totalProdutos }}
            </div>
            <div class="col-md-3">
                <strong>Sem Estoque:</strong> {{ $produtosSemEstoque }}
            </div>
            <div class="col-md-6">
                <strong>Valor Total do Estoque:</strong> 
                R$ {{ number_format($valorTotalEstoque, 2, ',', '.') }}
            </div>
        </div>
    </div>
</div>
@endsection