<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZOposts - Главная</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0a0a0a;
            color: #00ff00;
            font-family: 'Ubuntu Mono', monospace;
            line-height: 1.6;
        }

        .navbar {
            background-color: #000 !important;
            border-bottom: 1px solid #00ff00;
        }
        .navbar-brand, .nav-link {
            color: #00ff00 !important;
        }
        .nav-link:hover {
            color: #ffffff !important;
            text-shadow: 0 0 5px #00ff00;
        }
        .nav-link.active {
            color: #ffffff !important;
            font-weight: bold;
            text-decoration: underline;
        }

        .cursor {
            animation: blink 1s step-end infinite;
        }
        @keyframes blink {
            from, to { opacity: 1; }
            50% { opacity: 0; }
        }

        footer {
            background-color: #000 !important;
            border-top: 1px solid #00ff00;
            color: #00cc00 !important;
        }
        footer h5 {
            color: #00ff00 !important;
            text-shadow: 0 0 5px rgba(0, 255, 0, 0.5);
        }
        footer a {
            color: #00cc00 !important;
            text-decoration: none;
        }
        footer a:hover {
            color: #ffffff !important;
            text-shadow: 0 0 5px #00ff00;
        }
        footer hr {
            background-color: #00ff00 !important;
        }

        .card {
            background: #000;
            border: 1px solid #00ff00;
            color: #00cc00;
        }
        .card-title {
            color: #00ff00;
        }
        .btn-primary {
            background-color: #003300;
            border-color: #00ff00;
            color: #00ff00;
        }
        .btn-primary:hover {
            background-color: #00ff00;
            color: #000;
        }
        .btn-outline-primary {
            border-color: #00ff00;
            color: #00ff00;
        }
        .btn-outline-primary:hover {
            background-color: #00ff00;
            color: #000;
        }
        .form-control {
            background-color: #000;
            border: 1px solid #00ff00;
            color: #00ff00;
        }
        .form-control:focus {
            background-color: #000;
            color: #00ff00;
            border-color: #00ff00;
            box-shadow: 0 0 0 0.25rem rgba(0, 255, 0, 0.25);
        }
        .alert {
            background-color: #001a00;
            border: 1px solid #00ff00;
            color: #00cc00;
        }
    </style>
</head>
<body>
<!-- Навигационное меню -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href={{ route('home') }}>ZOposts<span class="cursor">_</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href={{ route('home') }}>Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('post.index') }}>Посты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('show_contacts') }}>О нас</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Футер -->
<footer class="text-center py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <h5>> ZOposts</h5>
                <p>Хакерский блог нового поколения</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h5>> Ссылки</h5>
                <ul class="list-unstyled">
                    <li><a href={{ route('home') }}>Главная</a></li>
                    <li><a href={{ route('post.index') }}>Посты</a></li>
                    <li><a href={{ route('show_contacts') }}>Контакты</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>> Контакты</h5>
                <p>email: secure@zoposts.onion<br />PGP: 0x1A2B3C4D5E6F7890</p>
            </div>
        </div>
        <hr />
        <p class="mb-0">&copy; 2025 ZOposts. Все права защищены. || Access granted.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Эффект мигающего курсора
    document.addEventListener('DOMContentLoaded', function() {
        const cursor = document.querySelector('.cursor');
        if (cursor) {
            setInterval(() => {
                cursor.style.opacity = cursor.style.opacity == '0' ? '1' : '0';
            }, 500);
        }
    });
</script>
</body>
</html>
