@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Заголовок -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 style="color: var(--admin-accent); border-bottom: 1px solid var(--admin-accent); padding-bottom: 10px;">
                <i class="bi bi-speedometer2 me-2"></i> Панель управления
            </h2>
            <div class="text-muted" style="color: var(--admin-text);">
                <i class="bi bi-arrow-clockwise me-1"></i> Обновлено: {{ now()->format('d.m.Y H:i') }}
            </div>
        </div>

        <!-- Виджеты статистики -->
        <div class="row g-4 mb-4">
            @include('admin.dashboard.widgets', ['model' => 'Post', 'title' => 'Посты', 'icon' => 'file-earmark-post'])
            @include('admin.dashboard.widgets', ['model' => 'Category', 'title' => 'Категории', 'icon' => 'folder'])
            @include('admin.dashboard.widgets', ['model' => 'Tag', 'title' => 'Теги', 'icon' => 'tags'])
            @include('admin.dashboard.widgets', ['model' => 'User', 'title' => 'Пользователи', 'icon' => 'people'])
        </div>

        <!-- Карточка с последними постами -->
        <div class="card admin-card">
            <div class="card-header d-flex justify-content-between align-items-center"
                 style="background: #000; border-bottom: 1px solid var(--admin-accent);">
                <div class="d-flex align-items-center">
                    <i class="bi bi-file-earmark-post fs-4 me-2" style="color: var(--admin-accent);"></i>
                    <h5 class="mb-0" style="color: var(--admin-accent);">Последние посты</h5>
                </div>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-admin">
                    Все посты <i class="bi bi-arrow-right ms-1 transition-all"></i>
                </a>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($latestPosts as $post)
                        <a href="{{ route('admin.posts.show', $post->id) }}"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-start py-3 px-4"
                           style="background: #000; border-color: #003300; transition: all 0.3s;">
                            <div class="flex-grow-1 me-3">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="mb-0" style="color: var(--admin-accent);">
                                        {{ $post->title }}
                                    </h6>
                                    <span class="badge"
                                          style="background: rgba(0, 255, 0, 0.1); color: var(--admin-accent);">
                                        <i class="bi bi-heart-fill text-danger me-1"></i> {{ $post->likes }}
                                    </span>
                                </div>

                                <p class="small mb-2" style="color: var(--admin-text); opacity: 0.8;">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>

                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    @if($post->category)
                                        <span class="badge me-1"
                                              style="background: rgba(0, 255, 0, 0.1); color: var(--admin-accent); border: 1px solid var(--admin-accent);">
                                            <i class="bi bi-folder me-1"></i> {{ $post->category->title }}
                                        </span>
                                    @endif

                                    @foreach($post->tags->take(2) as $tag)
                                        <span class="badge me-1"
                                              style="background: rgba(0, 255, 0, 0.05); color: var(--admin-accent); border: 1px dashed var(--admin-accent);">
                                            <i class="bi bi-tag me-1"></i> {{ $tag->title }}
                                        </span>
                                    @endforeach

                                    @if($post->tags->count() > 2)
                                        <span class="badge" style="background: #001a00; color: var(--admin-accent);">
                                            +{{ $post->tags->count() - 2 }}
                                        </span>
                                    @endif

                                    <small class="ms-auto text-muted">
                                        <i class="bi bi-calendar me-1"></i> {{ $post->created_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                            <div class="ps-2">
                                <i class="bi bi-chevron-right" style="color: var(--admin-accent);"></i>
                            </div>
                        </a>
                    @empty
                        <div class="list-group-item text-center py-5" style="background: #000;">
                            <i class="bi bi-inbox fs-1 mb-3" style="color: var(--admin-text); opacity: 0.5;"></i>
                            <p class="mb-0" style="color: var(--admin-text);">Постов пока нет</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="card-footer d-flex justify-content-center"
                 style="background: #000; border-top: 1px solid var(--admin-accent);">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-admin">
                    <i class="bi bi-plus-circle me-1"></i> Создать новый пост
                </a>
            </div>
        </div>
    </div>

    <style>
        .list-group-item-action:hover {
            background-color: rgba(0, 255, 0, 0.03) !important;
            transform: translateX(3px);
        }
        .transition-all {
            transition: all 0.3s;
        }
        .btn-admin:hover .transition-all {
            transform: translateX(3px);
        }
    </style>
@endsection
