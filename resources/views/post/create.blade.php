@extends('layouts/main')
@section('content')
    <section class="container my-5" style="max-width: 700px;">
        <h2 class="mb-5 text-center fw-bold" style="color: #2c3e50;">Создать пост</h2>
        <form method="post" class="p-4 bg-light rounded shadow-sm" action={{ route('post.store') }}>
            @csrf
            <div class="mb-4">
                <label for="postTitle" class="form-label fw-semibold">Заголовок</label>
                <input
                    name="title"
                    type="text"
                    class="form-control form-control-lg"
                    id="postTitle"
                    placeholder="Введите заголовок"
                    required
                    style="box-shadow: inset 0 0 8px rgba(0,0,0,0.1); transition: box-shadow 0.3s ease;">
            </div>
            <div class="mb-4">
                <label for="postContent" class="form-label fw-semibold">Содержание</label>
                <textarea
                    name="content"
                    class="form-control form-control-lg"
                    id="postContent"
                    rows="7"
                    placeholder="Введите содержание"
                    required
                    style="box-shadow: inset 0 0 8px rgba(0,0,0,0.1); transition: box-shadow 0.3s ease;"></textarea>
            </div>
            <div class="mb-4">
                <label for="postImage" class="form-label fw-semibold">Изображение</label>
                <input
                    name="image"
                    type="url"
                    class="form-control form-control-lg"
                    id="postImage"
                    placeholder="Введите ссылку на изображение"
                    required
                    style="box-shadow: inset 0 0 8px rgba(0,0,0,0.1); transition: box-shadow 0.3s ease;">
            </div>

            <div class="mb-4">
                <label for="postCategory" class="form-label fw-semibold">Категория</label>
                <select
                    name="category_id"
                    id="postCategory"
                    class="form-select form-select-lg"
                    required
                    style="box-shadow: inset 0 0 8px rgba(0,0,0,0.1); transition: box-shadow 0.3s ease;">
                    <option value="" disabled selected>Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Поле для выбора тегов -->
            <div class="mb-4">
                <label for="postTags" class="form-label fw-semibold">Теги</label>
                <select
                    name="tags[]"
                    id="postTags"
                    class="form-select form-select-lg"
                    multiple
                    style="box-shadow: inset 0 0 8px rgba(0,0,0,0.1); transition: box-shadow 0.3s ease; height: auto;">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                <small class="text-muted">Для выбора нескольких тегов удерживайте Ctrl</small>
            </div>

            <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm" style="font-weight: 600;">
                Создать пост
            </button>
        </form>
    </section>
@endsection
