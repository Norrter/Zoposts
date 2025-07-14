<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>О нас - ZOposts</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts - моноширинный шрифт для хакерского стиля -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0a0a0a;
            color: #00ff00;
            font-family: 'Ubuntu Mono', monospace;
            line-height: 1.6;
        }

        /* Навигационное меню в хакерском стиле */
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

        /* Hero секция */
        .about-hero {
            background: linear-gradient(135deg, #000000 0%, #0a2e0a 100%);
            min-height: 440px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
            border-bottom: 1px solid #00ff00;
            padding-bottom: 80px;
        }
        .about-hero .overlay {
            background: rgba(0, 15, 0, 0.7);
            border: 1px solid #00ff00;
            padding: 70px 40px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.5);
            text-align: center;
        }
        .about-hero h1 {
            color: #00ff00;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.7);
            font-size: 3rem;
            font-weight: 700;
            letter-spacing: 2px;
        }
        .about-hero p {
            color: #00cc00;
            font-size: 1.35rem;
            margin-bottom: 0;
        }

        /* Блок преимуществ */
        .features-section {
            margin-top: -60px;
            margin-bottom: 40px;
        }
        .feature-card {
            background: #000;
            border: 1px solid #00ff00;
            border-radius: 0;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);
            padding: 32px 24px;
            text-align: center;
            transition: all 0.3s;
            margin-top: 30px;
        }
        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 25px rgba(0, 255, 0, 0.5);
            background: #001a00;
        }
        .feature-icon {
            font-size: 2.7rem;
            color: #00ff00;
            margin-bottom: 18px;
        }
        .feature-card h5 {
            color: #ffffff;
            text-shadow: 0 0 5px #00ff00;
        }

        /* Основной контент */
        .about-section {
            background: #000;
            border: 1px solid #00ff00;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.2);
            padding: 48px 32px;
            margin-bottom: 40px;
            color: #00cc00;
        }
        .about-section h2 {
            color: #00ff00;
            font-weight: 700;
            margin-bottom: 18px;
            border-bottom: 1px solid #00ff00;
            padding-bottom: 10px;
            text-shadow: 0 0 5px rgba(0, 255, 0, 0.5);
        }

        /* Отзыв */
        .testimonial {
            background: #000;
            border: 1px solid #00ff00;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.3);
            padding: 32px 28px;
            margin-bottom: 40px;
            text-align: center;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            color: #00cc00;
        }
        .testimonial .bi {
            color: #00ff00;
            font-size: 2.2rem;
        }
        .testimonial .author {
            font-weight: 700;
            color: #00ff00;
            margin-top: 12px;
        }

        /* Футер */
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

        /* Эффект мигающего курсора */
        .cursor {
            animation: blink 1s step-end infinite;
        }
        @keyframes blink {
            from, to { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Эффект загрузки/обработки */
        .typing-effect {
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: 2px;
            animation: typing 3.5s steps(40, end);
        }
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @media (max-width: 768px) {
            .about-hero .overlay {
                padding: 30px 10px;
            }
            .about-section,
            .testimonial {
                padding: 20px 10px;
            }
        }
    </style>
</head>
<body>
<!-- Навигационное меню -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href={{ route('index') }}>ZOposts<span class="cursor">_</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href={{ route('index') }}>Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('post.index') }}>Посты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href={{ route('show_contacts') }}>О нас</a>
                </li>
                @can('view', auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href={{ route('admin.dashboard') }}>Админка</a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>

<!-- Hero секция -->
<section class="about-hero">
    <div class="overlay">
        <h1>>  О ZOposts</h1>
        <p class="typing-effect">Платформа для настоящих кибер-энтузиастов. Где рождаются идеи и взламываются стереотипы.</p>
    </div>
</section>

<!-- Преимущества -->
<div class="container features-section">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon mb-2"><i class="bi bi-terminal"></i></div>
                <h5 class="fw-bold mb-2">>Кибер-сообщество</h5>
                <p>Объединяем хакеров, разработчиков и всех, кто мыслит вне рамок. Обмен знаниями и опытом.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon mb-2"><i class="bi bi-shield-lock"></i></div>
                <h5 class="fw-bold mb-2">> Защищенный контент</h5>
                <p>Только проверенная информация. Никаких фейков - только чистые данные и факты.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon mb-2"><i class="bi bi-code-slash"></i></div>
                <h5 class="fw-bold mb-2">> Развитие навыков</h5>
                <p>Помогаем прокачивать скиллы в программировании, кибербезопасности и не только.</p>
            </div>
        </div>
    </div>
</div>

<!-- Основной контент "О нас" -->
<div class="container about-section">
    <h2>> Наша история</h2>
    <p>
        ZOposts начался как подпольный проект в 2022 году. Сначала это был просто блог о кибербезопасности, но сейчас мы выросли в полноценную платформу для всех, кто хочет выйти за рамки обыденного.
    </p>
    <h2>> Миссия и ценности</h2>
    <p>
        Наша цель - создавать пространство для свободного обмена знаниями без цензуры. Мы ценим анонимность, безопасность и право на информацию.
    </p>
    <h2>> Что мы предлагаем</h2>
    <p>
        Экспертные статьи по кибербезопасности, программированию, этичному хакингу. Новости из мира IT, которые вы не найдете в мейнстрим-медиа. Возможность анонимно делиться знаниями.
    </p>
    <h2>> Присоединяйтесь!</h2>
    <p>
        Хотите быть частью нашего сообщества? Регистрируйтесь и начинайте делиться знаниями уже сегодня. Помните: с большими знаниями приходит большая ответственность.
    </p>
</div>

<!-- Отзыв пользователя -->
<div class="container testimonial">
    <i class="bi bi-quote"></i>
    <p class="mt-3 mb-2">
        «ZOposts - это место, где я нашел единомышленников и могу обсуждать темы, которые нигде больше не поднимаются. Настоящая кибер-тусовка!»
    </p>
    <div class="author">- Anonymous, участник с 2023</div>
</div>

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
<!-- Дополнительные скрипты для эффектов -->
<script>
    // Эффект мигающего курсора
    document.addEventListener('DOMContentLoaded', function() {
        const cursor = document.querySelector('.cursor');
        setInterval(() => {
            cursor.style.opacity = cursor.style.opacity == '0' ? '1' : '0';
        }, 500);

        // Эффект "печатающегося текста" для других элементов
        const elements = document.querySelectorAll('.typing-effect');
        elements.forEach((el, index) => {
            setTimeout(() => {
                el.style.animation = `typing ${el.textContent.length/10}s steps(${el.textContent.length}, end)`;
            }, index * 300);
        });
    });
</script>
</body>
</html>
