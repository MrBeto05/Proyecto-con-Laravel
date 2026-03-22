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

        <!-- Mis Publicaciones -->
        @if ($posts->count() > 0)
            <div class="card card-custom mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Mis Publicaciones ({{ $posts->count() }})</h5>
                    <a href="{{ route('posts.index') }}" class="btn btn-cyber btn-sm">Ver todas</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 dashboard-posts">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="fw-bold">{{ Str::limit($post->title, 40) }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-warning' }}">
                                                {{ ucfirst($post->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('posts.show', $post) }}" class="btn btn-cyber btn-sm">
                                                    <i class="fas fa-eye me-1"></i>Ver
                                                </a>
                                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-cyber btn-sm"
                                                    style="background: linear-gradient(135deg, #0f3460, #16213e);">
                                                    <i class="fas fa-pen me-1"></i>Editar
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
