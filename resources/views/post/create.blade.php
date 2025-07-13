@extends('layouts/main')
@section('content')
    <section class="container my-5" style="max-width: 700px;">
        <h2 class="mb-5 text-center fw-bold" style="color: #00ff00; border-bottom: 1px solid #00ff00; padding-bottom: 10px;">> Создать пост</h2>
        <form method="post" class="p-4 rounded" action={{ route('post.store') }} style="background: #000; border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);">
        @csrf
        <div class="mb-4">
            <label for="postTitle" class="form-label fw-semibold" style="color: #00cc00;">> Заголовок</label>
            <input
                name="title"
                type="text"
                class="form-control form-control-lg"
                id="postTitle"
                placeholder="Введите заголовок"
                required
                style="background: #000; border: 1px solid #00ff00; color: #00ff00; box-shadow: inset 0 0 8px rgba(0,255,0,0.1);">
        </div>
        <div class="mb-4">
            <label for="postContent" class="form-label fw-semibold" style="color: #00cc00;">> Содержание</label>
            <textarea
                name="content"
                class="form-control form-control-lg"
                id="postContent"
                rows="7"
                placeholder="Введите содержание"
                required
                style="background: #000; border: 1px solid #00ff00; color: #00ff00; box-shadow: inset 0 0 8px rgba(0,255,0,0.1);"></textarea>
        </div>
        <div class="mb-4">
            <label for="postImage" class="form-label fw-semibold" style="color: #00cc00;">> Изображение</label>
            <input
                name="image"
                type="url"
                class="form-control form-control-lg"
                id="postImage"
                placeholder="Введите ссылку на изображение"
                required
                style="background: #000; border: 1px solid #00ff00; color: #00ff00; box-shadow: inset 0 0 8px rgba(0,255,0,0.1);">
        </div>

        <div class="mb-4">
            <label for="postCategory" class="form-label fw-semibold" style="color: #00cc00;">> Категория</label>
            <select
                name="category_id"
                id="postCategory"
                class="form-select form-select-lg"
                required
                style="background: #000; border: 1px solid #00ff00; color: #00ff00; box-shadow: inset 0 0 8px rgba(0,255,0,0.1);">
                <option value="" disabled selected>> Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">> {{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <!-- Поле для выбора тегов -->
        <div class="mb-4">
            <label for="postTags" class="form-label fw-semibold" style="color: #00cc00;">> Теги</label>
            <select
                name="tags[]"
                id="postTags"
                class="form-select form-select-lg"
                multiple
                style="background: #000; border: 1px solid #00ff00; color: #00ff00; box-shadow: inset 0 0 8px rgba(0,255,0,0.1); height: auto;">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">> {{$tag->title}}</option>
                @endforeach
            </select>
            <small class="text-muted" style="color: #666 !important;">> Для выбора нескольких тегов удерживайте Ctrl</small>
        </div>

        <button type="submit" class="btn btn-outline-primary btn-lg w-100" style="border-color: #00ff00; color: #00ff00; font-weight: 600;">
            > Создать пост
        </button>
        </form>
    </section>
@endsection
