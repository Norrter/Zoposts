@extends('layouts/main')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card overflow-hidden" style="background: #000; border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.3);">
                    <div class="card-header" style="background: #000; border-bottom: 1px solid #00ff00;">
                        <h2 class="fw-bold mb-0" style="color: #00ff00;">> Редактирование поста</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Поле для заголовка -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold" style="color: #00cc00;">> Заголовок</label>
                                <input
                                    type="text"
                                    class="form-control py-2"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $post->title) }}"
                                    required
                                    style="background: #000; border: 1px solid #00ff00; color: #00ff00;">
                                @error('title')
                                <div class="text-danger small mt-1" style="color: #ff5555 !important;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле для контента -->
                            <div class="mb-4">
                                <label for="content" class="form-label fw-semibold" style="color: #00cc00;">> Содержание</label>
                                <textarea
                                    class="form-control"
                                    id="content"
                                    name="content"
                                    rows="6"
                                    required
                                    style="background: #000; border: 1px solid #00ff00; color: #00ff00;">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                <div class="text-danger small mt-1" style="color: #ff5555 !important;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле для изображения -->
                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold" style="color: #00cc00;">> Изображение</label>
                                @if($post->image)
                                    <div class="mb-3">
                                        <img src="{{ $post->image }}" class="img-fluid rounded-3 mb-2"
                                             style="max-height: 200px; object-fit: cover; border: 1px solid #00ff00;">
                                    </div>
                                @endif
                                <input
                                    value="{{ old('image', $post->image) }}"
                                    type="url"
                                    class="form-control py-2"
                                    id="image"
                                    name="image"
                                    placeholder="Введите ссылку на изображение"
                                    style="background: #000; border: 1px solid #00ff00; color: #00ff00;">
                                @error('image')
                                <div class="text-danger small mt-1" style="color: #ff5555 !important;">{{ $message }}</div>
                                @enderror
                                <div class="form-text" style="color: #666 !important;">> Оставьте пустым, если не хотите изменять изображение</div>
                            </div>

                            <!-- Поле для категории -->
                            <div class="mb-4">
                                <label for="postCategory" class="form-label fw-semibold" style="color: #00cc00;">> Категория</label>
                                <select
                                    name="category_id"
                                    id="postCategory"
                                    class="form-select"
                                    style="background: #000; border: 1px solid #00ff00; color: #00ff00;">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                            > {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger small mt-1" style="color: #ff5555 !important;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле для тегов -->
                            <div class="mb-4">
                                <label for="tags" class="form-label fw-semibold" style="color: #00cc00;">> Теги</label>
                                <select
                                    name="tags[]"
                                    id="tags"
                                    class="form-select"
                                    multiple
                                    style="background: #000; border: 1px solid #00ff00; color: #00ff00;">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                            > {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tags')
                                <div class="text-danger small mt-1" style="color: #ff5555 !important;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Кнопки действий -->
                            <div class="d-flex justify-content-between align-items-center border-top pt-4" style="border-color: #00ff00 !important;">
                                <a href="{{ route('post.index') }}" class="btn btn-outline-secondary" style="border-color: #666; color: #666;">
                                    <i class="bi bi-arrow-left me-1"></i> > Отмена
                                </a>
                                <button type="submit" class="btn btn-outline-primary" style="border-color: #00ff00; color: #00ff00;">
                                    <i class="bi bi-save me-1"></i> > Сохранить изменения
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
