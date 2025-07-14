@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Заголовок с кнопкой создания -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 style="color: var(--admin-accent); border-bottom: 1px solid var(--admin-accent); padding-bottom: 10px;">
                    <i class="bi bi-file-earmark-post me-2"></i> Управление постами
                </h2>
                <p class="small mb-0" style="color: var(--admin-text); opacity: 0.7;">
                    Всего постов: {{ $posts->total() }} | Страница {{ $posts->currentPage() }} из {{ $posts->lastPage() }}
                </p>
            </div>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-admin">
                <i class="bi bi-plus-circle me-1"></i> Новый пост
            </a>
        </div>

        <!-- Карточка с таблицей постов -->
        <div class="card admin-card">
            <div class="card-header d-flex justify-content-between align-items-center"
                 style="background: #000; border-bottom: 1px solid var(--admin-accent);">
                <div class="d-flex align-items-center">
                    <i class="bi bi-list-ul fs-5 me-2" style="color: var(--admin-accent);"></i>
                    <h5 class="mb-0" style="color: var(--admin-accent);">Список постов</h5>
                </div>
                <div class="d-flex">
                    <input type="text" class="form-control form-control-sm me-2" placeholder="Поиск..."
                           style="background: #000; border: 1px solid var(--admin-accent); color: var(--admin-text); max-width: 200px;">
                    <button class="btn btn-sm btn-admin">
                        <i class="bi bi-funnel"></i>
                    </button>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0">
                        <thead>
                        <tr style="background: rgba(0, 255, 0, 0.05);">
                            <th style="width: 60px; color: var(--admin-accent);">ID</th>
                            <th style="color: var(--admin-accent);">Заголовок</th>
                            <th style="width: 150px; color: var(--admin-accent);">Категория</th>
                            <th style="width: 150px; color: var(--admin-accent);">Дата</th>
                            <th style="width: 120px; color: var(--admin-accent);">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                            <tr style="border-bottom: 1px solid rgba(0, 255, 0, 0.1);">
                                <td style="color: var(--admin-text);">{{ $post->id }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.show', $post->id) }}"
                                       class="text-decoration-none d-block"
                                       style="color: var(--admin-accent); max-width: 400px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>
                                    @if($post->category)
                                        <span class="badge"
                                              style="background: rgba(0, 255, 0, 0.1); color: var(--admin-accent); border: 1px solid var(--admin-accent);">
                                        {{ $post->category->title }}
                                    </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td style="color: var(--admin-text);">
                                    <small>{{ $post->created_at->format('d.m.Y H:i') }}</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.posts.show', $post->id) }}"
                                           class="btn btn-sm btn-admin px-2"
                                           title="Просмотр"
                                           style="width: 32px; height: 32px;">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                           class="btn btn-sm btn-admin px-2"
                                           title="Редактировать"
                                           style="width: 32px; height: 32px;">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-admin px-2"
                                                    title="Удалить"
                                                    style="width: 32px; height: 32px;"
                                                    onclick="return confirm('Удалить этот пост?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4" style="color: var(--admin-text);">
                                    <i class="bi bi-inbox fs-3 mb-2 d-block" style="opacity: 0.5;"></i>
                                    Посты не найдены
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Улучшенная пагинация -->
            <div class="card-footer d-flex justify-content-between align-items-center"
                 style="background: #000; border-top: 1px solid var(--admin-accent);">
                <div class="text-muted small" style="color: var(--admin-text);">
                    Показано с {{ $posts->firstItem() }} по {{ $posts->lastItem() }} из {{ $posts->total() }} записей
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        {{ $posts->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <style>
        .page-item.active .page-link {
            background-color: var(--admin-accent);
            border-color: var(--admin-accent);
            color: #000;
        }
        .page-link {
            background-color: #000;
            border-color: var(--admin-accent);
            color: var(--admin-text);
        }
        .page-link:hover {
            background-color: rgba(0, 255, 0, 0.1);
            color: var(--admin-accent);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 255, 0, 0.03) !important;
        }
    </style>
@endsection
