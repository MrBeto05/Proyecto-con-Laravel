@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="post-title">Gestor de Publicaciones</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-cyber">Crear Publicación</a>
        <hr>
        @if (session('ok'))
            <div class="alert-success p-3 mb-3 rounded">{{ session('ok') }}</div>
        @endif
        <table class="table tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Slug</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <span class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-warning' }}">
                                {{ $post->status == 'published' ? 'Publicado' : 'Borrador' }}
                            </span>
                        </td>
                        <td style="color:#7a8ba0;font-size:0.82rem;">{{ $post->slug }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('posts.show', $post) }}?from=gestor" class="btn btn-cyber btn-sm">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-cyber btn-sm"
                                    style="background:linear-gradient(135deg,#0f3460,#16213e);">
                                    <i class="fas fa-pen me-1"></i>Editar
                                </a>
                                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-cyber btn-sm"
                                        style="background:linear-gradient(135deg,#7f1d1d,#991b1b);"
                                        onclick="return confirm('¿Eliminar esta publicación?')">
                                        <i class="fas fa-trash me-1"></i>Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;color:#7a8ba0;padding:24px;">No hay publicaciones.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
