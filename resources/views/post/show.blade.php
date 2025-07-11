@extends('layouts/main')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Заголовок поста -->
                <h1 class="fw-bold mb-3" style="color: #2c3e50;">{{ $post->title }}</h1>

                <!-- Мета-информация -->
                <div class="d-flex align-items-center mb-4 text-muted">
                    <small class="me-3">
                        <i class="far fa-calendar-alt me-1"></i>
                        {{ $post->created_at->format('d.m.Y H:i') }}
                    </small>
                    <small>
                        <i class="far fa-clock me-1"></i>
                        {{ $post->created_at->diffForHumans() }}
                    </small>
                    <small class="ms-auto">
                        Автор: {{ $post->user->name ?? 'Неизвестен' }}
                    </small>
                </div>

                @if($post->category || $post->tags->isNotEmpty())
                    <div class="post-meta-footer mb-4">
                        <!-- Категория -->
                        @if($post->category)
                            <div class="category-badge mb-2">
                                <a href="#"
                                   class="badge bg-gradient-primary rounded-pill text-decoration-none py-2 px-3"
                                   style="font-size: 0.9rem; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                                    <i class="fas fa-folder-open me-1"></i>
                                    {{ $post->category->title }}
                                </a>
                            </div>
                        @endif

                        <!-- Теги -->
                        @if($post->tags->isNotEmpty())
                            <div class="tags-wrapper">
                                <span class="text-muted small me-2"><i class="fas fa-tags"></i> Теги:</span>
                                <div class="d-inline-flex flex-wrap gap-2">
                                    @foreach($post->tags as $tag)
                                        <a href="#"
                                           class="badge bg-light text-dark rounded-pill text-decoration-none py-1 px-2 border"
                                           style="font-size: 0.85rem; transition: all 0.3s ease;">
                                            <i class="fas fa-hashtag me-1 text-primary"></i>
                                            {{ $tag->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Изображение поста -->
                @if($post->image)
                    <div class="mb-4 rounded-4 overflow-hidden">
                        <img
                            src="{{ $post->image }}"
                            class="img-fluid w-100"
                            alt="{{ $post->title }}"
                            style="object-fit: cover; max-height: 500px;">
                    </div>
                @endif

                <!-- Контент поста -->
                <div class="mb-5" style="line-height: 1.8; font-size: 1.1rem;">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <!-- Кнопки действий -->
                <div class="d-flex justify-content-between align-items-center border-top pt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Назад
                    </a>

                    <div>
                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary me-2">
                                <i class="fas fa-edit me-1"></i> Изменить
                            </a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">
                                <i class="fas fa-trash me-1"></i> Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
