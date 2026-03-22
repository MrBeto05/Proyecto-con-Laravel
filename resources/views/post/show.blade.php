@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="post-title">{{ $post->title }}</h1>
    <p class="text-white"><strong>Slug:</strong> {{ $post->slug }}</p>
    <p class="text-white mb-3"><strong>Estado:</strong> <span class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($post->status) }}</span></p>
    <p class="text-white"><strong>Contenido:</strong></p>
    <div class="card">
        <div class="card-body">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('posts.index') }}" class="btn btn-cyber">Volver</a>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-cyber">Editar</a>
    </div>
</div>
@endsection

