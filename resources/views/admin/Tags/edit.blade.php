@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Хлебные крошки -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color: #000; border: 1px solid var(--admin-accent); padding: 0.75rem 1rem; border-radius: 0.25rem;">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}" style="color: var(--admin-accent);">
                        <i class="bi bi-speedometer2 me-1"></i> Дашборд
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.tag.index') }}" style="color: var(--admin-accent);">
                        <i class="bi bi-tags me-1"></i> Теги
                    </a>
                </li>
                <li class="breadcrumb-item active" style="color: var(--admin-text);">
                    <i class="bi bi-pencil me-1"></i> Редактирование
                </li>
            </ol>
        </nav>

        <!-- Заголовок -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 style="color: var(--admin-accent);">
                <i class="bi bi-pencil me-2"></i> Редактирование тега
            </h2>
            <a href="{{ route('admin.tag.index') }}" class="btn btn-sm btn-admin">
                <i class="bi bi-arrow-left me-1"></i> Назад к списку
            </a>
        </div>

        <!-- Форма редактирования -->
        <div class="card admin-card" style="background-color: #000; border: 1px solid var(--admin-accent);">
            <div class="card-body">
                <form action="{{ route('admin.tag.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="form-label" style="color: var(--admin-accent);">
                            <i class="bi bi-tag me-1"></i> Название тега
                        </label>
                        <input type="text"
                               class="form-control"
                               id="title"
                               name="title"
                               value="{{ old('title', $tag->title) }}"
                               required
                               style="background-color: #000;
                                      border: 1px solid var(--admin-accent);
                                      color: var(--admin-text);">
                        @error('title')
                        <div class="text-danger small mt-2" style="color: var(--admin-danger);">
                            <i class="bi bi-exclamation-triangle me-1"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-admin">
                            <i class="bi bi-save me-1"></i> Сохранить изменения
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
