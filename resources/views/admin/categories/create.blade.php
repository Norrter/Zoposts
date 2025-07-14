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
                    <a href="{{ route('admin.category.index') }}" style="color: var(--admin-accent);">
                        <i class="bi bi-folder me-1"></i> Категории
                    </a>
                </li>
                <li class="breadcrumb-item active" style="color: var(--admin-text);">
                    <i class="bi bi-plus-circle me-1"></i> Новая категория
                </li>
            </ol>
        </nav>

        <!-- Заголовок -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 style="color: var(--admin-accent);">
                <i class="bi bi-plus-circle me-2"></i> Создание категории
            </h2>
            <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-admin">
                <i class="bi bi-arrow-left me-1"></i> Назад к списку
            </a>
        </div>

        <!-- Форма создания -->
        <div class="card admin-card" style="background-color: #000; border: 1px solid var(--admin-accent);">
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="form-label" style="color: var(--admin-accent);">
                            <i class="bi bi-card-heading me-1"></i> Название категории
                        </label>
                        <input type="text"
                               class="form-control"
                               id="title"
                               name="title"
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
                </form>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // Генерация slug из названия
            document.getElementById('title').addEventListener('input', function() {
                const slugInput = document.getElementById('slug');
                if (!slugInput.value) {
                    slugInput.value = this.value
                        .toLowerCase()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                }
            });
        </script>
    @endsection
@endsection
