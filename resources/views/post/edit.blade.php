@extends('layouts/main')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0">
                        <h2 class="fw-bold mb-0" style="color: #2c3e50;">Редактирование поста</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Поле для заголовка -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold">Заголовок</label>
                                <input type="text" class="form-control rounded-3 py-2" id="title" name="title"
                                       value="{{ old('title', $post->title) }}" required>
                                @error('title')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле для контента -->
                            <div class="mb-4">
                                <label for="content" class="form-label fw-semibold">Содержание</label>
                                <textarea class="form-control rounded-3" id="content" name="content"
                                          rows="6" required>{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле для изображения -->
                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold">Изображение</label>
                                @if($post->image)
                                    <div class="mb-3">
                                        <img src="{{ $post->image }}" class="img-fluid rounded-3 mb-2"
                                             style="max-height: 200px; object-fit: cover;">
                                    </div>
                                @endif
                                <input value="{{ old('image', $post->image) }}" type="url" class="form-control rounded-3 py-2" id="image" name="image" placeholder="Введите ссылку на изображение">
                                @error('image')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Оставьте пустым, если не хотите изменять изображение</div>
                            </div>

                            <label for="postCategory" class="form-label fw-semibold">Категория</label>
                            <select
                                name="category_id"
                                id="postCategory"
                                class="form-select form-select-lg"
                                style="box-shadow: inset 0 0 8px rgba(0,0,0,0.1); transition: box-shadow 0.3s ease;">
                                <option value="" disabled selected>{{ old('content', $post->category->title) }}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach


                            </select>

                            <!-- Кнопки действий -->
                            <div class="d-flex justify-content-between align-items-center border-top pt-4">
                                <a href="{{ route('post.index') }}" class="btn btn-outline-secondary rounded-3">
                                    <i class="fas fa-arrow-left me-1"></i> Отмена
                                </a>
                                <button type="submit" class="btn btn-primary rounded-3 px-4" >
                                    <i class="fas fa-save me-1"></i> Сохранить изменения
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
