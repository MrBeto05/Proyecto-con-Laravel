<!doctype html>
<html lang="es">

<head>
    <title>Registro - CyberGuard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-dark position-absolute top-0 start-0 w-100">
        <div class="container">
            <a class="navbar-brand" href="/">CyberGuard</a>
        </div>
    </nav>

    <div class="signup-card">
        <h2 class="text-center mb-4">Crear Cuenta</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('signup.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="tu@email.com"
                    required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••"
                    required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-cyber">Registrarse</button>
        </form>

        <p class="text-center mt-3">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia Sesión</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('input[type="password"]').forEach(function(input) {
            new MutationObserver(function(mutations) {
                mutations.forEach(function(m) {
                    if (m.attributeName === 'type' && input.type !== 'password') {
                        input.type = 'password';
                    }
                });
            }).observe(input, {
                attributes: true
            });
        });
    </script>
</body>

</html>
