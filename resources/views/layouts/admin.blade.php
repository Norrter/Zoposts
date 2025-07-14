<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZOposts - Админка</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --admin-bg: #0a0a0a;
            --admin-text: #00cc00;
            --admin-accent: #00ff00;
            --admin-danger: #ff5555;
        }

        body {
            background-color: var(--admin-bg);
            color: var(--admin-text);
            font-family: 'Ubuntu Mono', monospace;
        }

        .admin-sidebar {
            background-color: #000;
            border-right: 1px solid var(--admin-accent);
            min-height: 100vh;
            width: 250px;
        }

        .admin-nav-link {
            color: var(--admin-text) !important;
            border-left: 3px solid transparent;
        }

        .admin-nav-link:hover, .admin-nav-link.active {
            color: #fff !important;
            background-color: #001a00;
            border-left-color: var(--admin-accent);
        }

        .cursor {
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {
            from, to { opacity: 1; }
            50% { opacity: 0; }
        }

         .pagination {
             margin-bottom: 0;
         }

        .page-item.disabled .page-link {
            background-color: #000;
            color: #666;
        }
        .admin-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 255, 0, 0.1);
        }

        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 255, 0, 0.2);
        }

        .list-group-item-hover:hover {
            background-color: #001a00 !important;
        }

        .btn-admin {
            background-color: #003300;
            border-color: #00ff00;
            color: #00ff00;
            transition: all 0.3s;
        }

        .btn-admin:hover {
            background-color: #005500;
            color: #ffffff;
        }

        /* Улучшенный курсор */
        .cursor {
            animation: blink 1s step-end infinite;
            font-weight: bold;
            color: var(--admin-accent);
        }
        .pagination {
            margin: 1rem 0;
            display: flex;
            justify-content: center;
        }

        .page-item .page-link {
            background-color: #000;
            color: var(--admin-accent);
            border: 1px solid var(--admin-accent);
            transition: all 0.2s ease;
        }

        .page-item .page-link:hover {
            background-color: #003300;
            color: #fff;
            border-color: var(--admin-accent);
        }

        .page-item.active .page-link {
            background-color: var(--admin-accent);
            color: #000;
            font-weight: bold;
            border-color: var(--admin-accent);
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Сайдбар -->
    <div class="admin-sidebar d-none d-md-block">
        <div class="p-4">
            <h4 class="text-center mb-4" style="color: var(--admin-accent);">
                ZOposts<span class="cursor">_</span>
                <small class="d-block mt-1" style="font-size: 0.8rem;">Админ-панель</small>
            </h4>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                       href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2 me-2"></i> Дашборд
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}"
                       href="{{ route('admin.posts.index') }}">
                        <i class="bi bi-file-earmark-post me-2"></i> Посты
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-nav-link" href="{{ route('admin.category.index') }}">
                        <i class="bi bi-folder me-2"></i> Категории
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-nav-link" href="{{ route('admin.tag.index') }}">
                        <i class="bi bi-tags me-2"></i> Теги
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link admin-nav-link" href="{{ route('index') }}">
                        <i class="bi bi-house-door me-2"></i> На главную
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Выход
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- Основной контент -->
    <div class="flex-grow-1">
        <!-- Навбар -->
        <nav class="navbar navbar-expand navbar-dark" style="background-color: #000; border-bottom: 1px solid var(--admin-accent);">
            <div class="container-fluid">
                <button class="btn d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse">
                    <i class="bi bi-list" style="color: var(--admin-accent);"></i>
                </button>

                <div class="ms-auto d-flex align-items-center">
                        <span class="me-3">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </span>
                </div>
            </div>
        </nav>

        <!-- Контент страницы -->
        <main class="p-4">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Адаптивное меню для мобильных устройств
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        const sidebar = document.querySelector('.admin-sidebar');

        if (sidebarCollapse) {
            sidebarCollapse.addEventListener('click', function() {
                sidebar.classList.toggle('d-none');
            });
        }
    });
</script>
</body>
</html>
