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
    <style>
        /* Hero секция с более тёмным градиентом и увеличенным нижним отступом */
        .about-hero {
            background: linear-gradient(120deg, #1b3a5a 0%, #2a4d75 100%);
            min-height: 440px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 8px 32px rgba(27, 58, 90, 0.6);
            border-radius: 0 0 24px 24px;
            padding-bottom: 80px; /* увеличенный нижний отступ */
        }
        .about-hero .overlay {
            background: rgba(0, 0, 0, 0.55);
            border-radius: 24px;
            padding: 70px 40px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        .about-hero h1 {
            color: #cce6ff;
            text-shadow: 2px 2px 14px rgba(0, 0, 0, 0.8);
            font-size: 3rem;
            font-weight: 700;
        }
        .about-hero p {
            color: #b3d1ff;
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.6);
            font-size: 1.35rem;
            margin-bottom: 0;
        }

        /* Блок преимуществ */
        .features-section {
            margin-top: -60px;
            margin-bottom: 40px;
        }
        .feature-card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(58, 153, 216, 0.1);
            padding: 32px 24px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 30px; /* увеличенный отступ сверху */
        }
        .feature-card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 10px 32px rgba(110, 193, 228, 0.3);
        }
        .feature-icon {
            font-size: 2.7rem;
            color: #3a99d8;
            margin-bottom: 18px;
        }

        /* Основной контент */
        .about-section {
            background: #f0f8ff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(58, 153, 216, 0.12);
            padding: 48px 32px;
            margin-bottom: 40px;
            color: #1a3e6e;
        }
        .about-section h2 {
            color: #3a99d8;
            font-weight: 700;
            margin-bottom: 18px;
        }
        .about-section p {
            font-size: 1.13rem;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        /* Отзыв */
        .testimonial {
            background: linear-gradient(110deg, #e6f2ff 70%, #cce5ff 100%);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(58, 153, 216, 0.12);
            padding: 32px 28px;
            margin-bottom: 40px;
            text-align: center;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            color: #1a3e6e;
            font-style: italic;
        }
        .testimonial .bi {
            color: #3a99d8;
            font-size: 2.2rem;
        }
        .testimonial .author {
            font-weight: 700;
            color: #3a99d8;
            margin-top: 12px;
            font-style: normal;
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
<!-- Навигационное меню (оставлено без изменений) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href={{ route('home') }}>ZOposts</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href={{ route('home') }}>Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('post.index') }}>Посты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href={{ route('show_contacts') }}>О нас</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero секция -->
<section class="about-hero">
    <div class="overlay">
        <h1>О ZOposts</h1>
        <p>Платформа, где рождаются лучшие статьи, блоги и настоящие отзывы.<br>Узнайте, кто мы, и почему тысячи людей выбирают ZOposts!</p>
    </div>
</section>

<!-- Преимущества -->
<div class="container features-section">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon mb-2"><i class="bi bi-people-fill"></i></div>
                <h5 class="fw-bold mb-2">Живое сообщество</h5>
                <p>Объединяем авторов и читателей, создавая атмосферу доверия, поддержки и обмена опытом.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon mb-2"><i class="bi bi-journal-richtext"></i></div>
                <h5 class="fw-bold mb-2">Качественный контент</h5>
                <p>Публикуем только проверенные статьи, экспертные обзоры и честные отзывы на актуальные темы.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon mb-2"><i class="bi bi-lightbulb-fill"></i></div>
                <h5 class="fw-bold mb-2">Вдохновение и развитие</h5>
                <p>Помогаем находить новые идеи, делиться знаниями и расти вместе с нашим сообществом.</p>
            </div>
        </div>
    </div>
</div>

<!-- Основной контент "О нас" -->
<div class="container about-section shadow-lg">
    <h2>Наша история</h2>
    <p>
        ZOposts появился в 2022 году как проект небольшой команды энтузиастов, мечтавших создать пространство для свободного обмена знаниями и вдохновением. Мы начинали с простого блога, а сегодня ZOposts - это динамичная платформа, где каждый может найти свой голос и аудиторию.
    </p>
    <h2>Миссия и ценности</h2>
    <p>
        Наша миссия - делать качественный контент доступным каждому. Мы ценим честность, открытость и уважение к мнению других. На ZOposts нет места фейкам и предвзятости - только проверенные факты, личный опыт и живое общение.
    </p>
    <h2>Что мы предлагаем</h2>
    <p>
        Каждый день мы публикуем свежие статьи, экспертные обзоры, личные блоги и честные отзывы. Здесь вы найдете материалы на самые разные темы - от технологий и образования до путешествий, саморазвития и творчества. Мы поддерживаем авторов, развиваем сообщество и всегда открыты для новых идей!
    </p>
    <h2>Присоединяйтесь!</h2>
    <p>
        Хотите делиться своими мыслями, читать интересные истории или просто быть в курсе новостей? Присоединяйтесь к ZOposts - вместе мы делаем интернет лучше!
    </p>
</div>

<!-- Отзыв пользователя -->
<div class="testimonial shadow">
    <i class="bi bi-chat-quote-fill"></i>
    <p class="mt-3 mb-2">
        «ZOposts - это место, где я нашёл единомышленников и смог делиться своим опытом. Здесь всегда интересно, уютно и по-настоящему живо!»
    </p>
    <div class="author">- Анна, постоянный автор</div>
</div>

<!-- Футер -->
<footer class="text-center bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <h5>ZOposts</h5>
                <p>Лучшие статьи на самые актуальные темы</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h5>Ссылки</h5>
                <ul class="list-unstyled">
                    <li><a href={{ route('home') }} class="text-white text-decoration-none">Главная</a></li>
                    <li><a href={{ route('post.index') }} class="text-white text-decoration-none">Посты</a></li>
                    <li><a href={{ route('show_contacts') }} class="text-white text-decoration-none">Контакты</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Контакты</h5>
                <p>email: info@zoposts.com<br />телефон: +1234567890</p>
            </div>
        </div>
        <hr class="bg-light" />
        <p class="mb-0">&copy; 2025 ZOposts. Все права защищены.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
