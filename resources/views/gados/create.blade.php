@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Gado</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gados.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Código</label>
            <input type="text" name="codigo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Leite (litros/semana)</label>
            <input type="number" name="leite" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Ração (kg/semana)</label>
            <input type="number" name="racao" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Peso (kg)</label>
            <input type="number" name="peso" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Data de nascimento</label>
            <input type="date" name="nascimento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fazenda</label>
            <select name="fazenda_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($fazendas as $fazenda)
                    <option value="{{ $fazenda->id }}">
                        {{ $fazenda->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('gados.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
