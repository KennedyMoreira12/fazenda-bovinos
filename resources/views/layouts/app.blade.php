<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema Fazenda Bovinos')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            min-height: 100vh;
        }
        .content {
            flex: 1;
            padding: 25px;
        }
        .nav-link.active {
            background-color: #198754 !important;
            color: #fff !important;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- MENU LATERAL -->
    <aside class="sidebar bg-dark text-white p-3">
        <h4 class="text-center mb-4">🐄 Fazenda</h4>

        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                   class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    📊 Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('gados.index') }}"
                   class="nav-link text-white {{ request()->routeIs('gados.*') ? 'active' : '' }}">
                    🐄 Gados
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('fazendas.index') }}"
                   class="nav-link text-white {{ request()->routeIs('fazendas.*') ? 'active' : '' }}">
                    🌾 Fazendas
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('veterinarios.index') }}"
                   class="nav-link text-white {{ request()->routeIs('veterinarios.*') ? 'active' : '' }}">
                    🩺 Veterinários
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('gados.abatidos') }}"
                   class="nav-link text-white">
                    🩸 Abatidos
                </a>
            </li>
        </ul>
    </aside>

    <!-- CONTEÚDO -->
    <main class="content bg-light">

        <!-- FLASH MESSAGES -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>

</div>

</body>
</html>
