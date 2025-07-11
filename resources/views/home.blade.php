@extends('layouts/main')
@section('content')
    <section class="hero-section text-center position-relative overflow-hidden" style="background: url('https://i.pinimg.com/originals/37/5b/d3/375bd3da75624abbe4388a8ceebda4db.jpg') no-repeat center center; background-size: cover; min-height: 450px;">
        <div class="container py-5 text-white" style="background: rgba(0,0,0,0.5); border-radius: 12px;">
            <h1 class="display-3 fw-bold mb-3" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">Добро пожаловать на ZOposts</h1>
            <p class="lead fs-4 mb-4" style="text-shadow: 1px 1px 6px rgba(0,0,0,0.6);">Лучшие статьи на самые актуальные темы</p>
            <a href={{ route('post.index') }} class="btn btn-primary btn-lg shadow-lg px-4">Перейти к постам</a>
        </div>
    </section>

    <div class="container my-5">
        <h2 class="mb-4 text-center fw-bold" style="color: #2c3e50; text-shadow: 1px 1px 3px #ddd;">Последние публикации</h2>
        <div class="row g-4">
            @foreach($latestPosts as $post)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <img src="{{ $post->image }}" class="card-img-top" alt="Изображение поста" style="object-fit: cover; height: 220px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                            <p class="card-text text-truncate" style="flex-grow: 1;">{{ $post->content }}</p>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-primary mt-3 align-self-start">Читать далее</a>
                        </div>
                        <div class="card-footer text-muted small fst-italic bg-white border-0">
                            Опубликовано {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
