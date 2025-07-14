@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card overflow-hidden" style="background: #000; border: 1px solid var(--admin-accent);">
                    <div class="card-header" style="background: #000; border-bottom: 1px solid var(--admin-accent);">
                        <h2 class="fw-bold mb-0" style="color: var(--admin-accent);">> Создать пост</h2>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('admin.posts.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold" style="color: var(--admin-text);">> Заголовок</label>
                                <input name="title" type="text" class="form-control" id="title" required
                                       style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);">
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label fw-semibold" style="color: var(--admin-text);">> Содержание</label>
                                <textarea name="content" class="form-control" id="content" rows="6" required
                                          style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold" style="color: var(--admin-text);">> Изображение</label>
                                <input name="image" type="url" class="form-control" id="image"
                                       style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);">
                            </div>

                            <div class="mb-4">
                                <label for="category_id" class="form-label fw-semibold" style="color: var(--admin-text);">> Категория</label>
                                <select name="category_id" id="category_id" class="form-select"
                                        style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">> {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="tags" class="form-label fw-semibold" style="color: var(--admin-text);">> Теги</label>
                                <select name="tags[]" id="tags" class="form-select" multiple
                                        style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text);">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">> {{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between border-top pt-4" style="border-color: var(--admin-accent);">
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-admin">
                                    <i class="bi bi-arrow-left me-1"></i> Отмена
                                </a>
                                <button type="submit" class="btn btn-admin">
                                    <i class="bi bi-save me-1"></i> Создать
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
