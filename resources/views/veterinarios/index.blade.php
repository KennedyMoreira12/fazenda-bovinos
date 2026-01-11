<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Veterinários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1>Veterinários</h1>

    <a href="{{ route('veterinarios.create') }}" class="btn btn-primary mb-3">
        Novo Veterinário
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRMV</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($veterinarios as $vet)
            <tr>
                <td>{{ $vet->id }}</td>
                <td>{{ $vet->nome }}</td>
                <td>{{ $vet->crmv }}</td>
                <td>
                    <a href="{{ route('veterinarios.edit', $vet->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('veterinarios.destroy', $vet->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir?')">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
