@php
    $modelClass = 'App\\Models\\' . $model;
    $count = $modelClass::count();
    // Определяем маршрут на основе модели
    $route = match($model) {
        'Post' => 'admin.posts.index',
        'Category' => 'admin.category.index',
        'Tag' => 'admin.tag.index',
        default => 'admin.dashboard'
    };
@endphp

<div class="col-md-6 col-lg-3 mb-4">
    <div class="card h-100 admin-card" style="background: #000; border: 1px solid var(--admin-accent); cursor: pointer;" onclick="window.location.href='{{ route($route) }}'">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 style="color: var(--admin-text);">{{ $title }}</h5>
                    <h2 class="mb-0" style="color: var(--admin-accent);">{{ number_format($count) }}</h2>
                </div>
                <div class="admin-icon-circle">
                    <i class="bi bi-{{ $icon }} fs-3"></i>
                </div>
            </div>
        </div>
        <div class="card-footer" style="background: #000; border-top: 1px solid var(--admin-accent);">
            <a href="{{ route($route) }}" class="text-decoration-none d-flex align-items-center admin-link">
                Управление {{ mb_strtolower($title) }}
                <i class="bi bi-arrow-right ms-2 transition-all"></i>
            </a>
        </div>
    </div>
</div>

<style>
    .admin-icon-circle {
        background: rgba(0, 255, 0, 0.1);
        color: var(--admin-accent);
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .admin-link {
        color: var(--admin-text);
        transition: all 0.3s;
    }

    .admin-link:hover {
        color: #ffffff;
    }

    .admin-link .transition-all {
        transition: all 0.3s;
    }

    .admin-link:hover .transition-all {
        transform: translateX(3px);
    }

    .admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 255, 0, 0.1);
        transition: all 0.3s;
    }
</style>
