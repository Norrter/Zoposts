@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Заголовок -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 style="color: var(--admin-accent);">
                <i class="bi bi-folder me-2"></i> Управление категориями
            </h2>
            <a href="#" class="btn btn-sm btn-admin">
                <i class="bi bi-plus-circle me-1"></i> Добавить категорию
            </a>
        </div>

        <!-- Таблица категорий -->
        <div class="card admin-card" style="background-color: #000; border: 1px solid var(--admin-accent);">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover mb-0">
                        <thead style="background: #000; border-bottom: 1px solid var(--admin-accent);">
                        <tr>
                            <th style="color: var(--admin-accent); width: 50px;">#</th>
                            <th style="color: var(--admin-accent);">Название</th>
                            <th style="color: var(--admin-accent); width: 120px;">Посты</th>
                            <th style="color: var(--admin-accent); width: 160px;">Дата создания</th>
                            <th style="color: var(--admin-accent); width: 120px;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($categories as $category)
                            <tr class="align-middle">
                                <td>{{ $category->id }}</td>
                                <td>
                                    <strong style="color: var(--admin-accent);">
                                        {{ $category->title }}
                                    </strong>
                                </td>
                                <td>
                                        <span class="badge" style="background: #001a00; color: #00cc00; border: 1px solid #00cc00;">
                                            {{ $category->posts_count }}
                                        </span>
                                </td>
                                <td>{{ $category->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-admin" title="Редактировать">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-admin" title="Удалить" onclick="return confirm('Вы уверены?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="bi bi-folder-x fs-3 mb-2"></i><br>
                                    Категорий пока нет
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
