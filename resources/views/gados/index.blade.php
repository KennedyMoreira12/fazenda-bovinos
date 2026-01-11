@extends('layouts.app')

@section('title', 'Gado')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>🐄 Gado</h1>
    <a href="{{ route('gados.create') }}" class="btn btn-primary">Novo Gado</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Código</th>
            <th>Leite (L/sem)</th>
            <th>Ração (Kg/sem)</th>
            <th>Peso (Kg)</th>
            <th>Fazenda</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gados as $gado)
        <tr>
            <td>{{ $gado->codigo }}</td>
            <td>{{ $gado->leite }}</td>
            <td>{{ $gado->racao }}</td>
            <td>{{ $gado->peso }}</td>
            <td>{{ $gado->fazenda->nome }}</td>
            <td class="d-flex gap-1">
                <a href="{{ route('gados.edit', $gado) }}"
                   class="btn btn-sm btn-warning">
                    ✏️ Editar
                </a>

                <form action="{{ route('gados.destroy', $gado->id) }}"
                      method="POST"
                      onsubmit="return confirm('Tem certeza que deseja excluir este animal?')">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger">
                        🗑️ Excluir
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $gados->links() }}
@endsection
