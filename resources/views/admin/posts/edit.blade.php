@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Карточка с формой -->
        <div class="card admin-card" style="background-color: #000; border: 1px solid var(--admin-accent);">
            <div class="card-header d-flex justify-content-between align-items-center"
                 style="background: #000; border-bottom: 1px solid var(--admin-accent);">
                <div>
                    <h2 class="mb-0" style="color: var(--admin-accent);">
                        <i class="bi bi-pencil-square me-2"></i> Редактирование поста
                    </h2>
                    <small class="text-muted" style="color: var(--admin-text); opacity: 0.7;">
                        ID: {{ $post->id }} | Создан: {{ $post->created_at->format('d.m.Y H:i') }}
                    </small>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Заголовок -->
                    <div class="mb-4">
                        <label for="title" class="form-label" style="color: var(--admin-text);">
                            <i class="bi bi-card-heading me-1"></i> Заголовок
                        </label>
                        <input type="text" class="form-control" id="title" name="title"
                               value="{{ old('title', $post->title) }}" required
                               style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);">
                        @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Контент -->
                    <div class="mb-4">
                        <label for="content" class="form-label" style="color: var(--admin-text);">
                            <i class="bi bi-text-paragraph me-1"></i> Содержание
                        </label>
                        <textarea class="form-control" id="content" name="content" rows="8" required
                                  style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text); min-height: 200px;">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Изображение -->
                    <div class="mb-4">
                        <label class="form-label" style="color: var(--admin-text);">
                            <i class="bi bi-image me-1"></i> Изображение
                        </label>
                        @if($post->image)
                            <div class="mb-3 position-relative">
                                <img src="{{ $post->image }}" class="img-fluid rounded mb-2"
                                     style="max-height: 200px; border: 1px solid var(--admin-accent);">
                            </div>
                        @endif
                        <input type="url" class="form-control" name="image"
                               value="{{ old('image', $post->image) }}"
                               placeholder="URL изображения"
                               style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);">
                        @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-text" style="color: var(--admin-text); opacity: 0.6;">
                            Оставьте пустым, чтобы не изменять текущее изображение
                        </div>
                    </div>

                    <!-- Категория -->
                    <div class="mb-4">
                        <label for="category_id" class="form-label" style="color: var(--admin-text);">
                            <i class="bi bi-folder me-1"></i> Категория
                        </label>
                        <select name="category_id" id="category_id" class="form-select"
                                style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);">
                            <option value="">Без категории</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Теги -->
                    <div class="mb-4">
                        <label for="tags" class="form-label" style="color: var(--admin-text);">
                            <i class="bi bi-tags me-1"></i> Теги
                        </label>
                        <select name="tags[]" id="tags" class="form-select" multiple
                                style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('tags')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-text" style="color: var(--admin-text); opacity: 0.6;">
                            Для выбора нескольких тегов удерживайте Ctrl (Cmd на Mac)
                        </div>
                    </div>

                    <!-- Кнопки действий -->
                    <div class="d-flex justify-content-end pt-4 border-top"
                         style="border-color: var(--admin-accent);">
                        <div class="btn-group">
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-admin">
                                <i class="bi bi-arrow-left me-1"></i> Назад
                            </a>
                            <button type="submit" class="btn btn-admin">
                                <i class="bi bi-save me-1"></i> Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        textarea {
            resize: vertical;
            min-height: 200px;
        }

        .form-select[multiple] {
            height: auto !important;
            min-height: 100px;
        }
    </style>
@endsection
