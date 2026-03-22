<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberGuard - Ciberseguridad Avanzada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/inicio.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body style="padding-top: 70px;">
    <nav class="navbar navbar-expand-lg navbar-dark"
        style="background: linear-gradient(135deg, rgba(22, 33, 62, 0.95), rgba(15, 52, 96, 0.9)); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(233, 69, 96, 0.3); position: fixed; top: 0; left: 0; right: 0; z-index: 1000;">
        <div class="container">
            <a class="navbar-brand" href="#"
                style="background: linear-gradient(135deg, #e94560, #fff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800; font-size: 1.8rem;">
                CyberGuard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#estadisticas">Estadísticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#amenazas">Amenazas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#proteccion">Protección</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link nav-link-login" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-signup" href="{{ route('signup') }}">Sign Up</a>
                        </li>
                    @endguest
                </ul>
                @auth
                    <div class="dropdown ms-3">
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
                            <li><a class="dropdown-item-custom" href="{{ route('dashboard') }}"><i
                                        class="fas fa-gauge-high"></i> Dashboard</a></li>
                            <li><a class="dropdown-item-custom" href="{{ route('posts.index') }}"><i
                                        class="fas fa-file-lines"></i> Mis Publicaciones</a></li>
                            <li>
                                <hr class="dropdown-divider-custom">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item-custom logout-item w-100"><i
                                            class="fas fa-right-from-bracket"></i> Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <section id="hero" class="arriba"
        style="padding: 150px 0; background: linear-gradient(135deg, #0c0c1a 0%, #1a1a2e 50%, #16213e 100%); position: relative;">
        <div class="container text-center">
            <h1 class="display-3 fw-bold mb-5"
                style="background: linear-gradient(135deg, #fff 0%, #e94560 50%, #0f3460 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: clamp(3.5rem, 8vw, 6rem); animation: textGlow 3s ease-in-out infinite alternate;">
                Ciberseguridad
            </h1>
            <p class="lead mb-5 fs-4" style="color: #eaeaea; max-width: 600px; margin: 0 auto; font-weight: 300;">
                Protegiendo el mundo digital contra amenazas cibernéticas avanzadas
            </p>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 flex-wrap">
                <a href="#amenazas" class="btn btn-cyber btn-lg px-5 py-3" style="font-size: 1.2rem; font-weight: 700;">
                    Explorar Amenazas
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                    Empezar Gratis
                </a>
            </div>
        </div>
    </section>

    <section id="estadisticas" class="py-5 bg-dark">
        <div class="container">
            <div class="row text-center g-4">

                <div class="col-lg-3 col-md-6">
                    <div class="card-custom h-100 stat-card">
                        <div class="card-body px-4 py-4">
                            <div class="stat-icon-wrap mb-3">
                                <i class="fas fa-envelope-open-text stat-icon"></i>
                            </div>
                            <div class="numest mb-1">3.4B</div>
                            <h5 class="card-title mb-3">Correos Maliciosos Diarios</h5>
                            <div class="stat-bar-wrap">
                                <div class="stat-bar-label">
                                    <span>Nivel de amenaza</span><span class="stat-bar-pct">92%</span>
                                </div>
                                <div class="stat-bar-track">
                                    <div class="stat-bar-fill" style="--pct:92%; --clr:#e94560;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card-custom h-100 stat-card">
                        <div class="card-body px-4 py-4">
                            <div class="stat-icon-wrap mb-3">
                                <i class="fas fa-sack-dollar stat-icon"></i>
                            </div>
                            <div class="numest mb-1">$4.45M</div>
                            <h5 class="card-title mb-3">Costo Promedio Brecha</h5>
                            <div class="stat-bar-wrap">
                                <div class="stat-bar-label">
                                    <span>Impacto financiero</span><span class="stat-bar-pct">85%</span>
                                </div>
                                <div class="stat-bar-track">
                                    <div class="stat-bar-fill" style="--pct:85%; --clr:#f59e0b;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card-custom h-100 stat-card">
                        <div class="card-body px-4 py-4">
                            <div class="stat-icon-wrap mb-3">
                                <i class="fas fa-clock stat-icon"></i>
                            </div>
                            <div class="numest mb-1">232</div>
                            <h5 class="card-title mb-3">Días para Detectar</h5>
                            <div class="stat-bar-wrap">
                                <div class="stat-bar-label">
                                    <span>Tiempo de exposición</span><span class="stat-bar-pct">78%</span>
                                </div>
                                <div class="stat-bar-track">
                                    <div class="stat-bar-fill" style="--pct:78%; --clr:#e94560;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card-custom h-100 stat-card">
                        <div class="card-body px-4 py-4">
                            <div class="stat-icon-wrap mb-3">
                                <i class="fas fa-user-xmark stat-icon"></i>
                            </div>
                            <div class="numest mb-1">95%</div>
                            <h5 class="card-title mb-3">Brechas por Error Humano</h5>
                            <div class="stat-bar-wrap">
                                <div class="stat-bar-label">
                                    <span>Factor humano</span><span class="stat-bar-pct">95%</span>
                                </div>
                                <div class="stat-bar-track">
                                    <div class="stat-bar-fill" style="--pct:95%; --clr:#e94560;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="amenazas" class="py-5 bg-gradient"
        style="background: linear-gradient(135deg, #16213e 0%, #1a1a2e 100%);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-4" style="color: #e94560;">Amenazas Cibernéticas Críticas</h2>
                <p class="lead" style="color: #a0a0a0;">Las principales amenazas que enfrentamos diariamente</p>
            </div>
            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="card-custom h-100 threat-card">
                        <div class="card-body text-center px-4 py-4">
                            <div class="threat-icon-wrap mb-3" style="--threat-clr:#e94560;">
                                <i class="fas fa-bug"></i>
                            </div>
                            <span class="badge bg-danger mb-3">CRÍTICO</span>
                            <h4 class="card-title mb-2">Malware</h4>
                            <p class="card-text mb-3">Software malicioso que infecta sistemas para robar datos o causar
                                daño.</p>
                            <div class="threat-dots" data-level="5">
                                <span class="dot active"></span><span class="dot active"></span><span
                                    class="dot active"></span><span class="dot active"></span><span
                                    class="dot active"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card-custom h-100 threat-card">
                        <div class="card-body text-center px-4 py-4">
                            <div class="threat-icon-wrap mb-3" style="--threat-clr:#f59e0b;">
                                <i class="fas fa-fish-fins"></i>
                            </div>
                            <span class="badge bg-warning mb-3">ALTO</span>
                            <h4 class="card-title mb-2">Phishing</h4>
                            <p class="card-text mb-3">Emails fraudulentos diseñados para robar credenciales y datos
                                sensibles.</p>
                            <div class="threat-dots">
                                <span class="dot active" style="--dot-clr:#f59e0b;"></span><span class="dot active"
                                    style="--dot-clr:#f59e0b;"></span><span class="dot active"
                                    style="--dot-clr:#f59e0b;"></span><span class="dot active"
                                    style="--dot-clr:#f59e0b;"></span><span class="dot"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card-custom h-100 threat-card">
                        <div class="card-body text-center px-4 py-4">
                            <div class="threat-icon-wrap mb-3" style="--threat-clr:#e94560;">
                                <i class="fas fa-lock-open"></i>
                            </div>
                            <span class="badge bg-danger mb-3">CRÍTICO</span>
                            <h4 class="card-title mb-2">Ransomware</h4>
                            <p class="card-text mb-3">Encripta archivos y exige rescate — miles de millones en pérdidas
                                anuales.</p>
                            <div class="threat-dots">
                                <span class="dot active"></span><span class="dot active"></span><span
                                    class="dot active"></span><span class="dot active"></span><span
                                    class="dot active"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-custom h-100 threat-card">
                        <div class="card-body text-center px-4 py-4">
                            <div class="threat-icon-wrap mb-3" style="--threat-clr:#f59e0b;">
                                <i class="fas fa-server"></i>
                            </div>
                            <span class="badge bg-warning mb-3">ALTO</span>
                            <h4 class="card-title mb-2">DDoS</h4>
                            <p class="card-text mb-3">Saturación de servidores para interrumpir servicios críticos.</p>
                            <div class="threat-dots">
                                <span class="dot active" style="--dot-clr:#f59e0b;"></span><span class="dot active"
                                    style="--dot-clr:#f59e0b;"></span><span class="dot active"
                                    style="--dot-clr:#f59e0b;"></span><span class="dot active"
                                    style="--dot-clr:#f59e0b;"></span><span class="dot"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-custom h-100 threat-card">
                        <div class="card-body text-center px-4 py-4">
                            <div class="threat-icon-wrap mb-3" style="--threat-clr:#64b5f6;">
                                <i class="fas fa-database"></i>
                            </div>
                            <span class="badge bg-secondary mb-3"
                                style="background: linear-gradient(135deg,#475569,#334155)!important;">MEDIO</span>
                            <h4 class="card-title mb-2">SQL Injection</h4>
                            <p class="card-text mb-3">Explotación de vulnerabilidades en bases de datos.</p>
                            <div class="threat-dots">
                                <span class="dot active" style="--dot-clr:#64b5f6;"></span><span class="dot active"
                                    style="--dot-clr:#64b5f6;"></span><span class="dot active"
                                    style="--dot-clr:#64b5f6;"></span><span class="dot"></span><span
                                    class="dot"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="proteccion" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #e94560;">Tu Defensa Perfecta</h2>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-4">
                                <div class="card-custom me-3 p-3" style="min-width: 60px;">
                                    <i class="fas fa-shield-alt" style="font-size: 1.5rem; color: #e94560;"></i>
                                </div>
                                <div>
                                    <h5>Firewall Avanzado</h5>
                                    <p class="mb-0">Bloquea amenazas antes de que lleguen.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-4">
                                <div class="card-custom me-3 p-3" style="min-width: 60px;">
                                    <i class="fas fa-lock" style="font-size: 1.5rem; color: #e94560;"></i>
                                </div>
                                <div>
                                    <h5>2FA Siempre</h5>
                                    <p class="mb-0">Autenticación biométrica + SMS.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="card-custom me-3 p-3" style="min-width: 60px;">
                                    <i class="fas fa-download" style="font-size: 1.5rem; color: #e94560;"></i>
                                </div>
                                <div>
                                    <h5>Auto-Updates</h5>
                                    <p class="mb-0">Siempre actualizado, siempre seguro.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="card-custom me-3 p-3" style="min-width: 60px;">
                                    <i class="fas fa-wifi" style="font-size: 1.5rem; color: #e94560;"></i>
                                </div>
                                <div>
                                    <h5>VPN Militar</h5>
                                    <p class="mb-0">Encriptación AES-256 en todas las redes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div
                        style="background: linear-gradient(145deg, rgba(22, 33, 62, 0.8), rgba(15, 52, 96, 0.8)); border-radius: 24px; padding: 60px 40px; position: relative; box-shadow: 0 35px 70px rgba(233, 69, 96, 0.2);">
                        <h3 style="color: #e94560; font-weight: 800; margin-bottom: 20px;">Tu Seguridad Empieza Hoy
                        </h3>
                        <p style="color: #eaeaea; font-size: 1.1rem; line-height: 1.6;">
                            Únete a miles de usuarios protegidos contra las amenazas más avanzadas.
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('signup') }}" class="btn btn-cyber btn-lg px-5 py-3 me-3 mb-2">Comenzar
                                Ahora</a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-5 py-3 mb-2">Ya
                                tengo cuenta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contacto" class="py-5 bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow" style="border: 1px solid rgba(233, 69, 96, 0.3);">
                        <div class="card-header"
                            style="background: linear-gradient(135deg, #16213e, #1a1a2e); color: #e94560; border-bottom: 1px solid rgba(233, 69, 96, 0.3);">
                            <h4 class="mb-0 fw-bold">¿Necesitas Ayuda?</h4>
                        </div>
                        <div class="card-body p-5">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form action="{{ route('contacto.enviar') }}" method="POST" novalidate>
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label"
                                            style="color: #eaeaea;">Nombre</label>
                                        <input type="text" id="nombre" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            style="background: rgba(15, 52, 96, 0.85); border: 2px solid rgba(233, 69, 96, 0.3); color: #fff;"
                                            placeholder="Tu nombre" value="{{ old('nombre') }}" maxlength="100"
                                            required>
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label"
                                            style="color: #eaeaea;">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            style="background: rgba(15, 52, 96, 0.85); border: 2px solid rgba(233, 69, 96, 0.3); color: #fff;"
                                            placeholder="tu@email.com" value="{{ old('email') }}" maxlength="150"
                                            required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="asunto" class="form-label" style="color: #eaeaea;">Asunto</label>
                                    <select id="asunto" name="asunto"
                                        class="form-select @error('asunto') is-invalid @enderror"
                                        style="background: rgba(15, 52, 96, 0.85); border: 2px solid rgba(233, 69, 96, 0.3); color: #fff;"
                                        required>
                                        <option value="">-- Selecciona --</option>
                                        <option value="general" {{ old('asunto') == 'general' ? 'selected' : '' }}>
                                            Consulta General</option>
                                        <option value="incidente"
                                            {{ old('asunto') == 'incidente' ? 'selected' : '' }}>Reportar Incidente
                                        </option>
                                        <option value="auditoria"
                                            {{ old('asunto') == 'auditoria' ? 'selected' : '' }}>Solicitar Auditoría
                                        </option>
                                        <option value="capacitacion"
                                            {{ old('asunto') == 'capacitacion' ? 'selected' : '' }}>Capacitación
                                        </option>
                                    </select>
                                    @error('asunto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mensaje" class="form-label" style="color: #eaeaea;">Mensaje</label>
                                    <textarea id="mensaje" name="mensaje" rows="4" class="form-control @error('mensaje') is-invalid @enderror"
                                        style="background: rgba(15, 52, 96, 0.85); border: 2px solid rgba(233, 69, 96, 0.3); color: #fff;"
                                        placeholder="Describe tu consulta..." maxlength="1000" required>{{ old('mensaje') }}</textarea>
                                    @error('mensaje')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-cyber w-100">
                                    Enviar Mensaje
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
