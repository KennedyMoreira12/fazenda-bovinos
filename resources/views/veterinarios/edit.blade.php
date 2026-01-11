<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Veterinário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1>Editar Veterinário</h1>

    <form action="{{ route('veterinarios.update', $veterinario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $veterinario->nome }}" required>
        </div>

        <div class="mb-3">
            <label>CRMV</label>
            <input type="text" name="crmv" class="form-control" value="{{ $veterinario->crmv }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('veterinarios.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>
