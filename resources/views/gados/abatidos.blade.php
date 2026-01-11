<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Animais Abatidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1>🩸 Relatório de Animais Abatidos</h1>

    <a href="{{ route('gados.index') }}" class="btn btn-secondary mb-3">
        Voltar
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Peso</th>
                <th>Fazenda</th>
                <th>Data de Nascimento</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gados as $gado)
                <tr>
                    <td>{{ $gado->codigo }}</td>
                    <td>{{ $gado->peso }} kg</td>
                    <td>{{ $gado->fazenda->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($gado->nascimento)->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Nenhum animal abatido encontrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $gados->links() }}
</div>

</body>
</html>
