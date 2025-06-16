<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('titulo')</title>

    <style>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: black;
        color: yellow;
        padding: 20px;
    }

    div a {
        text-decoration: none;
        color: white;
        padding: 0px 20px;
    }

    div a:hover {
        text-decoration: overline;
    }

    </style>
</head>
<body>
    <header>
        <div>
            <h1>Laravel</h1>
        </div>
        <div>
            <a href="home">Home</a>
            <a href="sobre">Sobre</a>
            <a href="produtos">Produtos</a>
            <a href="contato">Contato</a>
            @if(session()->has('usuario_id'))
                <div class="dropdown d-inline-block ms-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ session('usuario_nome') }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li>
                            <form action="{{ url('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">Sair</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="frmlogin" class="btn btn-primary ms-3">Login</a>
            @endif
        </div>
    </header>
    <main>
        @yield('conteudo')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>