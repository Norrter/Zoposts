@extends('layouts/main')
@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="fw-bold mb-0" style="color: #2c3e50; text-shadow: 1px 1px 3px #ddd;">Все посты</h1>
            <a href="{{ route('post.create') }}" class="btn btn-primary shadow-sm" style="font-weight: 600;">
                <i class="fas fa-plus me-1"></i> Создать пост
            </a>
        </div>

        <!-- Фильтры -->
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-3">Фильтры</h5>
                <form method="GET" action="{{ route('post.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="title" class="form-label">По названию</label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="{{ request('title') }}"
                                placeholder="Введите название...">
                        </div>
                        <div class="col-md-4">
                            <label for="content" class="form-label">По содержанию</label>
                            <input
                                type="text"
                                class="form-control"
                                id="content"
                                name="content"
                                value="{{ request('content') }}"
                                placeholder="Введите текст...">
                        </div>
                        <div class="col-md-4">
                            <label for="category_id" class="form-label">По категории</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">Все категории</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary shadow-sm">
                                <i class="fas fa-filter me-1"></i> Применить
                            </button>
                            <a href="{{ route('post.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i> Сбросить
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Список постов -->
        <div class="row g-4">
            @forelse($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        @if(!$post->image)
                            <div class="card-body d-flex flex-column">
                                <a>У поста нет картинки</a>
                            </div>
                        @else
                            <img
                                src="{{ $post->image }}"
                                class="card-img-top"
                                alt="{{ $post->title }}"
                                style="object-fit: cover; height: 220px;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">{{ $post->title }}</h5>
                            <p class="card-text text-truncate" style="flex-grow: 1;">{{ Str::limit($post->content, 150) }}</p>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                            <a class="btn btn-outline-primary btn-sm shadow-sm" href="{{ route('post.show', $post->id) }}" style="font-weight: 600;">Читать далее</a>
                            <small class="text-muted fst-italic">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center fs-5">Постов пока нет</div>
                </div>
            @endforelse
        </div>

        <!-- Пагинация -->
        @if($posts->hasPages())
            <div class="mt-4">
                {{ $posts->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
