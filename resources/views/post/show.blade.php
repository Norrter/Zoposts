@extends('layouts/main')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Заголовок поста -->
                <h1 class="fw-bold mb-3" style="color: #00ff00; border-bottom: 1px solid #00ff00; padding-bottom: 10px;">> {{ $post->title }}</h1>

                <!-- Мета-информация -->
                <div class="d-flex align-items-center mb-4" style="color: #00cc00;">
                    <small class="me-3">
                        <i class="bi bi-calendar me-1"></i>
                        > {{ $post->created_at->format('d.m.Y H:i') }}
                    </small>
                    <small>
                        <i class="bi bi-clock me-1"></i>
                        > {{ $post->created_at->diffForHumans() }}
                    </small>
                    <small class="ms-auto">
                        > Автор: {{ $post->user->name ?? 'Неизвестен' }}
                    </small>
                </div>

                @if($post->category || $post->tags->isNotEmpty())
                    <div class="post-meta-footer mb-4">
                        <!-- Категория -->
                        @if($post->category)
                            <div class="category-badge mb-2">
                                <a href="#"
                                   class="badge rounded-pill text-decoration-none py-2 px-3"
                                   style="font-size: 0.9rem; background: linear-gradient(135deg, #003300 0%, #006600 100%); color: #00ff00;">
                                    <i class="bi bi-folder me-1"></i>
                                    > {{ $post->category->title }}
                                </a>
                            </div>
                        @endif

                        <!-- Теги -->
                        @if($post->tags->isNotEmpty())
                            <div class="tags-wrapper">
                                <span class="small me-2" style="color: #00cc00;"><i class="bi bi-tags"></i> > Теги:</span>
                                <div class="d-inline-flex flex-wrap gap-2">
                                    @foreach($post->tags as $tag)
                                        <a href="#"
                                           class="badge rounded-pill text-decoration-none py-1 px-2"
                                           style="font-size: 0.85rem; background: #001a00; color: #00ff00; border: 1px solid #00ff00;">
                                            <i class="bi bi-hash me-1"></i>
                                            > {{ $tag->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Изображение поста -->
                @if($post->image)
                    <div class="mb-4 rounded-4 overflow-hidden">
                        <img
                            src="{{ $post->image }}"
                            class="img-fluid w-100"
                            alt="{{ $post->title }}"
                            style="object-fit: cover; max-height: 500px; border: 1px solid #00ff00;">
                    </div>
                @endif

                <!-- Контент поста -->
                <div class="mb-5" style="line-height: 1.8; font-size: 1.1rem; color: #00cc00;">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <!-- Кнопки действий -->
                <div class="d-flex justify-content-between align-items-center border-top pt-4" style="border-color: #00ff00 !important;">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary" style="border-color: #666; color: #666;">
                        <i class="bi bi-arrow-left me-1"></i> > Назад
                    </a>

                    <div>
                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-outline-primary me-2" style="border-color: #00ff00; color: #00ff00;">
                            <i class="bi bi-pencil me-1"></i> > Изменить
                        </a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" style="border-color: #ff5555; color: #ff5555;" onclick="return confirm('Вы уверены?')">
                                <i class="bi bi-trash me-1"></i> > Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
