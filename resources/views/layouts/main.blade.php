<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZOposts - Главная</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .hero-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            margin-bottom: 40px;
        }
        .post-card {
            margin-bottom: 30px;
            transition: transform 0.3s;
        }
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }
        input.form-control-lg:focus,
        textarea.form-control-lg:focus {
            box-shadow: 0 0 8px #28a745;
            border-color: #28a745;
        }
        /* Плавное наведение на кнопку */
        button.btn-success:hover {
            background-color: #218838;
            box-shadow: 0 4px 12px rgba(33, 136, 56, 0.6);
        }
        .hero-section {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-text {
            max-height: 4.5em; /* approx 3 lines */
            overflow: hidden;
        }
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
            transition: background-color 0.3s ease;
        }

    </style>
</head>
<body>
<!-- Навигационное меню -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href={{ route('home') }}>ZOposts</a>
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
            <footer class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>ZOposts</h5>
                            <p>Лучшие статьи на самые актуальные темы</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Ссылки</h5>
                            <ul class="list-unstyled">
                                <li><a href={{ route('home') }} class="text-white">Главная</a></li>
                                <li><a href={{ route('post.index') }} class="text-white">Посты</a></li>
                                <li><a href={{ route('show_contacts') }} class="text-white">Контакты</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5>Контакты</h5>
                            <p>email: info@zoposts.com<br>телефон: +1234567890</p>
                        </div>
                    </div>
                    <hr class="bg-light">
                    <p>&copy; 2025 ZOposts. Все права защищены.</p>
                </div>
            </footer>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
