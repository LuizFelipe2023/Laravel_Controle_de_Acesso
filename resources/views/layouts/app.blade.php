<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Protect</title>
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .navbar {
            background-color: #343a40;
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }

        .navbar input[type="text"] {
            margin-right: 10px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .navbar .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .navbar .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand mx-4" href="{{route('acessos.index')}}"><img style="width: 55px; border-radius: 50%; margin-right: 7px;" src="{{asset('logo.jpg')}}" alt="">Protect</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-1">
                            <a href="{{ route('acessos.index') }}" class="nav-link">Acessos</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a href="{{ route('pontos.index') }}" class="nav-link">Lista de Pontos</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a href="{{ route('pontos.meusPontos') }}" class="nav-link">Meus Pontos</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a href="{{ route('pontos.saida.create') }}" class="nav-link">Registrar Saída</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a href="{{ route('usuarios.listar') }}" class="nav-link">Usuários</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a href="{{ route('profile') }}" class="nav-link">Perfil</a>
                        </li>
                        <li class="nav-item mx-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="footer">
        &copy; 2024 Protect. Todos os direitos reservados.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
