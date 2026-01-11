@extends('layouts.app')

@section('title', 'Editar Fazenda')

@section('content')

<h2 class="mb-4">✏️ Editar Fazenda</h2>

<form action="{{ route('fazendas.update', $fazenda->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- NOME --}}
    <div class="mb-3">
        <label class="form-label">Nome da Fazenda</label>
        <input type="text"
               name="nome"
               class="form-control"
               value="{{ old('nome', $fazenda->nome) }}"
               required>
    </div>

    {{-- TAMANHO --}}
    <div class="mb-3">
        <label class="form-label">Tamanho (hectares)</label>
        <input type="number"
               name="tamanho"
               class="form-control"
               value="{{ old('tamanho', $fazenda->tamanho) }}"
               required>
    </div>

    {{-- RESPONSÁVEL --}}
    <div class="mb-3">
        <label class="form-label">Responsável</label>
        <input type="text"
               name="responsavel"
               class="form-control"
               value="{{ old('responsavel', $fazenda->responsavel) }}"
               required>
    </div>

    {{-- VETERINÁRIOS --}}
    <div class="mb-3">
        <label class="form-label">Veterinários Responsáveis</label>
        <select name="veterinarios[]" class="form-control" multiple>
            @foreach($veterinarios as $vet)
                <option value="{{ $vet->id }}"
                    {{ $fazenda->veterinarios->contains($vet->id) ? 'selected' : '' }}>
                    {{ $vet->nome }}
                </option>
            @endforeach
        </select>
        <small class="text-muted">
            Segure CTRL (Windows) ou CMD (Mac) para selecionar vários
        </small>
    </div>

    <button class="btn btn-success">💾 Salvar</button>
    <a href="{{ route('fazendas.index') }}" class="btn btn-secondary">Voltar</a>

</form>

@endsection
