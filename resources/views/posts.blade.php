@extends('layouts/main')
@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="fw-bold mb-0" style="color: #00ff00; border-bottom: 1px solid #00ff00; padding-bottom: 10px;">> Все посты</h1>
            <a href="{{ route('post.create') }}" class="btn btn-outline-primary" style="border-color: #00ff00; color: #00ff00;">
                <i class="bi bi-plus me-1"></i> > Создать пост
            </a>
        </div>

        <!-- Фильтры -->
        <div class="card mb-4" style="background: #000; border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-3" style="color: #00ff00;">> Фильтры</h5>
                <form method="GET" action="{{ route('post.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="title" class="form-label" style="color: #00cc00;">> По названию</label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="{{ request('title') }}"
                                placeholder="Введите название..."
                                style="background: #000; border: 1px solid #00ff00; color: #00ff00;">
                        </div>
                        <div class="col-md-4">
                            <label for="content" class="form-label" style="color: #00cc00;">> По содержанию</label>
                            <input
                                type="text"
                                class="form-control"
                                id="content"
                                name="content"
                                value="{{ request('content') }}"
                                placeholder="Введите текст..."
                                style="background: #000; border: 1px solid #00ff00; color: #00ff00;">
                        </div>
                        <div class="col-md-4">
                            <label for="category_id" class="form-label" style="color: #00cc00;">> По категории</label>
                            <select
                                class="form-select"
                                id="category_id"
                                name="category_id"
                                style="background: #000; border: 1px solid #00ff00; color: #00ff00;">
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
                            <button type="submit" class="btn btn-outline-primary" style="border-color: #00ff00; color: #00ff00;">
                                <i class="bi bi-filter me-1"></i> > Применить
                            </button>
                            <a href="{{ route('post.index') }}" class="btn btn-outline-secondary" style="border-color: #666; color: #666;">
                                <i class="bi bi-x me-1"></i> > Сбросить
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
                    <div class="card h-100" style="background: #000; border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);">
                        @if($post->image)
                            <img
                                src="{{ $post->image }}"
                                class="card-img-top"
                                alt="{{ $post->title }}"
                                style="object-fit: cover; height: 220px; border-bottom: 1px solid #00ff00;">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 220px; background: #000; border-bottom: 1px solid #00ff00; color: #00cc00;">
                                <i class="bi bi-image" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold" style="color: #00ff00;">> {{ $post->title }}</h5>
                            <p class="card-text text-truncate" style="flex-grow: 1; color: #00cc00;">{{ Str::limit($post->content, 150) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center" style="background: #000; border-top: 1px solid #00ff00;">
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('post.show', $post->id) }}" style="border-color: #00ff00; color: #00ff00;">> Читать далее</a>
                            <small class="text-muted fst-italic" style="color: #00cc00 !important;">> {{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert text-center fs-5" style="background: #001a00; border: 1px solid #00ff00; color: #00cc00;">
                        > Постов пока нет
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Пагинация -->
        @if($posts->hasPages())
            <div class="mt-4">
                {{ $posts->withQueryString()->links('pagination') }}
            </div>
        @endif
    </div>

    <style>
        .pagination .page-link {
            background-color: #000;
            border-color: #00ff00;
            color: #00ff00;
        }
        .pagination .page-item.active .page-link {
            background-color: #00ff00;
            border-color: #00ff00;
            color: #000;
        }
        .pagination .page-item.disabled .page-link {
            background-color: #000;
            border-color: #666;
            color: #666;
        }
    </style>
@endsection
