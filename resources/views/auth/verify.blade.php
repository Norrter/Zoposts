@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #000; border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.3);">
                    <div class="card-header" style="background: #000; border-bottom: 1px solid #00ff00; color: #00ff00; font-size: 1.25rem;">
                        > Подтверждение Email
                    </div>

                    <div class="card-body" style="color: #00cc00;">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert" style="background-color: #001a00; border: 1px solid #00ff00; color: #00cc00;">
                                > Новая ссылка для подтверждения была отправлена на ваш email.
                            </div>
                        @endif

                        > Прежде чем продолжить, пожалуйста, проверьте свою электронную почту для получения ссылки подтверждения.
                        <br><br>
                        > Если вы не получили письмо,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: #00cc00; text-decoration: none;">
                                > нажмите здесь для повторной отправки
                            </button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-link:hover {
            color: #00ff00 !important;
            text-shadow: 0 0 5px rgba(0, 255, 0, 0.5);
        }
    </style>
@endsection
