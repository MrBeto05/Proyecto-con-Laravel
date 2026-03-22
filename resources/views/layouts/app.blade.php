<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CyberGuard - Dashboard')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/posts.css') }}">
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-dark-custom">
        <div class="container">
            <a class="navbar-brand" href="/">CyberGuard</a>
            <div class="d-flex align-items-center">
                @auth
                    <div class="dropdown">
                        <button class="btn user-pill dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                            <span class="user-name">{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down user-chevron"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                            <li class="dropdown-header-custom">
                                <div class="user-avatar-lg">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                                <div>
                                    <div class="user-dropdown-name">{{ auth()->user()->name }}</div>
                                    <div class="user-dropdown-email">{{ auth()->user()->email }}</div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider-custom">
                            </li>
                            <li>
                                <a class="dropdown-item-custom" href="{{ route('dashboard') }}">
                                    <i class="fas fa-gauge-high"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item-custom" href="{{ route('posts.index') }}">
                                    <i class="fas fa-file-lines"></i> Mis Publicaciones
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider-custom">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item-custom logout-item w-100">
                                        <i class="fas fa-right-from-bracket"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
                    <a href="{{ route('signup') }}" class="btn btn-cyber btn-sm">Sign Up</a>
                @endauth
            </div>
        </div>
    </nav>
    <main class="py-4">@yield('content')</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
