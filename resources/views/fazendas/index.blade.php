@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fazendas</h1>

    <a href="{{ route('fazendas.create') }}" class="btn btn-primary mb-3">
        Nova Fazenda
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tamanho (HA)</th>
                <th>Responsável</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fazendas as $fazenda)
            <tr>
                <td>{{ $fazenda->nome }}</td>
                <td>{{ $fazenda->tamanho }}</td>
                <td>{{ $fazenda->responsavel }}</td>
                <td>
                    <a href="{{ route('fazendas.edit', $fazenda->id) }}" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                    <form action="{{ route('fazendas.destroy', $fazenda->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $fazendas->links() }}
</div>
@endsection
