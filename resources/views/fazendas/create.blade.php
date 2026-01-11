<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Fazenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1>Cadastrar Fazenda</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fazendas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nome da Fazenda</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tamanho (hectares)</label>
            <input type="number" name="tamanho" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Responsável</label>
            <input type="text" name="responsavel" class="form-control" required>
        </div>

        <!-- AQUI ENTRA O RELACIONAMENTO -->
        <div class="mb-3">
            <label>Veterinários responsáveis</label>
            <select name="veterinarios[]" class="form-control" multiple>
                @foreach($veterinarios as $vet)
                    <option value="{{ $vet->id }}">
                        {{ $vet->nome }} ({{ $vet->crmv }})
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Segure CTRL para selecionar mais de um veterinário</small>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('fazendas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>
