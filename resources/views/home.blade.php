@extends('layouts/main')
@section('content')
    <section class="hero-section text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, #000000 0%, #0a2e0a 100%); min-height: 450px; display: flex; align-items: center; justify-content: center; border-bottom: 1px solid #00ff00;">
        <div class="container py-5" style="background: rgba(0, 15, 0, 0.7); border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.5); max-width: 800px;">
            <h1 class="display-3 fw-bold mb-3" style="color: #00ff00; text-shadow: 0 0 10px rgba(0, 255, 0, 0.7);">> Добро пожаловать на ZOposts</h1>
            <p class="lead fs-4 mb-4" style="color: #00cc00;">Лучшие статьи на самые актуальные темы для кибер-энтузиастов</p>
            <a href={{ route('post.index') }} class="btn btn-outline-primary btn-lg px-4" style="border-color: #00ff00; color: #00ff00;">> Перейти к постам</a>
        </div>
    </section>

    <div class="container my-5">
        <h2 class="mb-4 text-center fw-bold" style="color: #00ff00; border-bottom: 1px solid #00ff00; padding-bottom: 10px;">> Последние публикации</h2>
        <div class="row g-4">
            @foreach($latestPosts as $post)
                <div class="col-md-4">
                    <div class="card h-100" style="background: #000; border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);">
                        @if($post->image)
                            <img src="{{ $post->image }}" class="card-img-top" alt="Изображение поста" style="object-fit: cover; height: 220px; border-bottom: 1px solid #00ff00;">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 220px; background: #000; border-bottom: 1px solid #00ff00; color: #00cc00;">
                                <i class="bi bi-image" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold" style="color: #00ff00;">> {{ $post->title }}</h5>
                            <p class="card-text text-truncate" style="flex-grow: 1; color: #00cc00;">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-primary mt-3 align-self-start">> Читать далее</a>
                        </div>
                        <div class="card-footer text-muted small fst-italic" style="background: #000; border-top: 1px solid #00ff00; color: #00cc00;">
                            > Опубликовано {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
