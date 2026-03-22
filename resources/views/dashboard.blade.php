@extends('layouts.app')

@section('title', 'Dashboard - CyberGuard')

@section('content')
    <div class="dashboard-container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-custom mb-4">
            <div class="card-body">
                <h2 class="card-title">Bienvenido al Dashboard</h2>
                <p class="card-text">Gestiona tu protección cibernética desde aquí.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Mis Dispositivos</h5>
                        <p class="card-text">0 dispositivos protegidos</p>
                        <a href="#" class="btn btn-cyber">Agregar Dispositivo</a>
                        <a href="{{ route('posts.index') }}" class="btn btn-cyber">Gestionar publicaciones</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Alertas de Seguridad</h5>
                        <p class="card-text">Sin alertas recientes</p>
                        <a href="#" class="btn btn-cyber">Ver Historial</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <h5 class="card-title">Estado de Protección</h5>
                <div class="mt-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="firewall" checked>
                        <label class="form-check-label" for="firewall">Firewall Activo</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="antivirus" checked>
                        <label class="form-check-label" for="antivirus">Antivirus Actualizado</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="vpn">
                        <label class="form-check-label" for="vpn">VPN Conectada</label>
                    </div>
                </div>
            </div>
        </div>

        @if ($posts->count() > 0)
            <div class="card card-custom mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Mis Publicaciones recientes ({{ $posts->count() }})</h5>
                </div>
                <div class="card-body">
                    @foreach ($posts as $post)
                        @php
                            $limite = 300;
                            $contenido = $post->content;
                            $esLargo = strlen($contenido) > $limite;
                            $resumen = $esLargo ? Str::limit($contenido, $limite, '') : $contenido;
                            $postId = 'post-' . $post->id;
                        @endphp

                        <div class="dashboard-post-card mb-4 p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold mb-0" style="color: var(--cyber-accent, #00d4ff);">
                                    {{ $post->title }}
                                </h6>
                                <span
                                    class="badge {{ $post->status === 'published' ? 'bg-success' : 'bg-warning' }} ms-2 flex-shrink-0">
                                    {{ $post->status === 'published' ? 'Publicado' : 'Borrador' }}
                                </span>
                            </div>

                            @if ($esLargo)
                                <div id="{{ $postId }}-resumen">
                                    <p class="post-content-text mb-2">{{ $resumen }}...</p>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <button class="btn btn-cyber btn-sm" onclick="expandirPost('{{ $postId }}')">
                                            <i class="fas fa-chevron-down me-1"></i>Leer más
                                        </button>
                                        <a href="{{ route('posts.show', $post) }}" class="btn btn-cyber btn-sm"
                                            style="background: linear-gradient(135deg, #0f3460, #16213e);">
                                            <i class="fas fa-external-link-alt me-1"></i>Ver página completa
                                        </a>
                                    </div>
                                </div>

                                <div id="{{ $postId }}-completo" style="display: none;">
                                    <p class="post-content-text mb-2" style="white-space: pre-line;">{{ $contenido }}
                                    </p>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <button class="btn btn-cyber btn-sm" onclick="contraerPost('{{ $postId }}')">
                                            <i class="fas fa-chevron-up me-1"></i>Mostrar menos
                                        </button>
                                        <a href="{{ route('posts.show', $post) }}" class="btn btn-cyber btn-sm"
                                            style="background: linear-gradient(135deg, #0f3460, #16213e);">
                                            <i class="fas fa-external-link-alt me-1"></i>Ver página completa
                                        </a>
                                    </div>
                                </div>
                            @else
                                <p class="post-content-text mb-2" style="white-space: pre-line;">{{ $contenido }}</p>
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-cyber btn-sm"
                                    style="background: linear-gradient(135deg, #0f3460, #16213e);">
                                    <i class="fas fa-external-link-alt me-1"></i>Ver publicación
                                </a>
                            @endif
                        </div>

                        @if (!$loop->last)
                            <hr style="border-color: rgba(255,255,255,0.08); margin: 0 0 1rem 0;">
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <div class="card card-custom mt-4">
                <div class="card-body text-center py-5">
                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No tienes publicaciones aún</h5>
                    <a href="{{ route('posts.create') }}" class="btn btn-cyber mt-2">Crear primera publicación</a>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        function expandirPost(postId) {
            document.getElementById(postId + '-resumen').style.display = 'none';
            document.getElementById(postId + '-completo').style.display = 'block';
        }

        function contraerPost(postId) {
            document.getElementById(postId + '-completo').style.display = 'none';
            document.getElementById(postId + '-resumen').style.display = 'block';
        }
    </script>
@endsection
