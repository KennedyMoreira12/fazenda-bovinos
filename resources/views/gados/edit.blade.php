@extends('layouts.app')

@section('title', 'Editar Gado')

@section('content')

<h2 class="mb-4">✏️ Editar Gado</h2>

{{-- FORM DE EDIÇÃO --}}
<form action="{{ route('gados.update', $gado->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- CÓDIGO --}}
    <div class="mb-3">
        <label class="form-label">Código do Animal</label>
        <input type="text"
               name="codigo"
               class="form-control"
               value="{{ old('codigo', $gado->codigo) }}"
               required>
    </div>

    {{-- LEITE --}}
    <div class="mb-3">
        <label class="form-label">Produção de Leite (L/semana)</label>
        <input type="number"
               name="leite"
               class="form-control"
               value="{{ old('leite', $gado->leite) }}"
               min="0"
               required>
    </div>

    {{-- RAÇÃO --}}
    <div class="mb-3">
        <label class="form-label">Consumo de Ração (Kg/semana)</label>
        <input type="number"
               name="racao"
               class="form-control"
               value="{{ old('racao', $gado->racao) }}"
               min="0"
               required>
    </div>

    {{-- PESO --}}
    <div class="mb-3">
        <label class="form-label">Peso (Kg)</label>
        <input type="number"
               name="peso"
               class="form-control"
               value="{{ old('peso', $gado->peso) }}"
               min="0"
               required>
    </div>

    {{-- NASCIMENTO --}}
    <div class="mb-3">
        <label class="form-label">Data de Nascimento</label>
        <input type="date"
               name="nascimento"
               class="form-control"
               value="{{ old('nascimento', $gado->nascimento->format('Y-m-d')) }}"
               required>
    </div>

    {{-- FAZENDA --}}
    <div class="mb-3">
        <label class="form-label">Fazenda</label>
        <select name="fazenda_id" class="form-control" required>
            @foreach($fazendas as $fazenda)
                <option value="{{ $fazenda->id }}"
                    {{ $gado->fazenda_id == $fazenda->id ? 'selected' : '' }}>
                    {{ $fazenda->nome }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- ABATIDO --}}
    <div class="form-check mb-3">
        <input type="checkbox"
               name="abatido"
               value="1"
               class="form-check-input"
               {{ $gado->abatido ? 'checked' : '' }}>
        <label class="form-check-label">Animal abatido</label>
    </div>

    {{-- BOTÕES --}}
    <div class="d-flex gap-2">
        <button class="btn btn-success">
            💾 Salvar
        </button>

        <a href="{{ route('gados.index') }}" class="btn btn-secondary">
            ↩️ Voltar
        </a>
    </div>
</form>

@endsection
