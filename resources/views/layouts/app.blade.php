<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería MDT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Librería MDT</a>

        <ul class="navbar-nav ms-auto align-items-center">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                </li>
            @else
                <li class="nav-item">
                    <span class="navbar-text me-3">
                        {{ Auth::user()->name }}
                        <span class="badge bg-secondary">{{ Auth::user()->role }}</span>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- El logout se hace con POST y @csrf, no con un enlace -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

@stack('scripts')

</body>
</html>