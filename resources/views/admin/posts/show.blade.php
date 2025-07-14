@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 style="color: var(--admin-accent);">> {{ $post->title }}</h1>
                    <div>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-admin me-2">
                            <i class="bi bi-pencil me-1"></i> Редактировать
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-admin" onclick="return confirm('Удалить пост?')">
                                <i class="bi bi-trash me-1"></i> Удалить
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card admin-card mb-4">
                    <div class="card-body">
                        @if($post->image)
                            <div class="mb-4">
                                <img src="{{ $post->image }}" class="img-fluid rounded" style="max-height: 400px;">
                            </div>
                        @endif

                        <div style="color: var(--admin-text);">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div>
                                @if($post->category)
                                    <span class="badge bg-dark text-success me-2">
                                    {{ $post->category->title }}
                                </span>
                                @endif
                                <small class="text-muted">
                                    <i class="bi bi-calendar me-1"></i>
                                    {{ $post->created_at->format('d.m.Y H:i') }}
                                </small>
                            </div>
                            <small class="text-muted">
                                Автор: {{ $post->user->name ?? 'Неизвестен' }}
                            </small>
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.posts.index') }}" class="btn btn-admin">
                    <i class="bi bi-arrow-left me-1"></i> Назад к списку
                </a>
            </div>
        </div>
    </div>
@endsection
