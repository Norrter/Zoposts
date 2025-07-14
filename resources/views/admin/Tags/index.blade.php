@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <!-- Заголовок -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 style="color: var(--admin-accent);">
                <i class="bi bi-tags me-2"></i> Управление тегами
            </h2>
            <a href="{{ route('admin.tag.create') }}" class="btn btn-sm btn-admin">
                <i class="bi bi-plus-circle me-1"></i> Добавить тег
            </a>
        </div>

        <!-- Таблица тегов -->
        <div class="card admin-card" style="background-color: #000; border: 1px solid var(--admin-accent);">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover mb-0">
                        <thead style="background: #000; border-bottom: 1px solid var(--admin-accent);">
                        <tr>
                            <th style="color: var(--admin-accent); width: 50px;">#</th>
                            <th style="color: var(--admin-accent);">Название</th>
                            <th style="color: var(--admin-accent); width: 160px;">Дата создания</th>
                            <th style="color: var(--admin-accent); width: 120px;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($tags as $tag)
                            <tr class="align-middle">
                                <td>{{ $tag->id }}</td>
                                <td>
                                    <strong style="color: var(--admin-accent);">
                                        {{ $tag->title }}
                                    </strong>
                                </td>
                                <td>{{ $tag->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.tag.edit', $tag) }}" class="btn btn-admin" title="Редактировать">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.tag.destroy', $tag) }}" method="POST">
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
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="bi bi-tags fs-3 mb-2"></i><br>
                                    Тегов пока нет
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
