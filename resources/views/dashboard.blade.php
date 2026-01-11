@extends('layouts.app')

@section('title', 'Dashboard - Fazenda Bovinos')

@section('content')

<h3 class="mb-4">📊 Dashboard Geral</h3>

<!-- CARDS PRINCIPAIS -->
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card shadow text-white bg-primary mb-3">
            <div class="card-body text-center">
                <h6 class="card-title">🥛 Leite Produzido / Semana</h6>
                <h2>{{ $totalLeite }} L</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow text-white bg-warning mb-3">
            <div class="card-body text-center">
                <h6 class="card-title">🌾 Ração Consumida / Semana</h6>
                <h2>{{ $totalRacao }} Kg</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow text-white bg-danger mb-3">
            <div class="card-body text-center">
                <h6 class="card-title">🐄 Animais Jovens (alto consumo)</h6>
                <h2>{{ $animaisJovens }}</h2>
            </div>
        </div>
    </div>

</div>

<!-- DESCRIÇÃO DOS RELATÓRIOS -->
<div class="card shadow mb-4">
    <div class="card-body">
        <h5 class="card-title">📋 Relatórios do Sistema</h5>
        <ul class="mb-0">
            <li>Total de leite produzido por semana</li>
            <li>Total de ração consumida por semana</li>
            <li>Quantidade de animais com até 1 ano consumindo mais de 500kg de ração</li>
            <li>Relatório de animais abatidos</li>
        </ul>
    </div>
</div>

<!-- ATALHOS -->
<h4 class="mb-3">🚀 Acesso Rápido</h4>

<div class="row mb-4">
    <div class="col-md-3 mb-2">
        <a href="{{ route('gados.index') }}" class="btn btn-outline-primary w-100">
            🐄 Gerenciar Gados
        </a>
    </div>

    <div class="col-md-3 mb-2">
        <a href="{{ route('fazendas.index') }}" class="btn btn-outline-success w-100">
            🌾 Gerenciar Fazendas
        </a>
    </div>

    <div class="col-md-3 mb-2">
        <a href="{{ route('veterinarios.index') }}" class="btn btn-outline-warning w-100">
            🩺 Gerenciar Veterinários
        </a>
    </div>

    <div class="col-md-3 mb-2">
        <a href="{{ route('gados.abatidos') }}" class="btn btn-outline-danger w-100">
            🩸 Relatório de Abatidos
        </a>
    </div>
</div>

@endsection
