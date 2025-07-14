@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #000; border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.3);">
                    <div class="card-header" style="background: #000; border-bottom: 1px solid #00ff00; color: #00ff00; font-size: 1.25rem;">
                        > Вход в систему
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end" style="color: #00cc00;">
                                    > Email
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required
                                           autocomplete="email"
                                           autofocus
                                           style="background: #000; border: 1px solid #00ff00; color: #00ff00;">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: #ff5555;">
                                        <strong>> {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-end" style="color: #00cc00;">
                                    > Пароль
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           required
                                           autocomplete="current-password"
                                           style="background: #000; border: 1px solid #00ff00; color: #00ff00;">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="color: #ff5555;">
                                        <strong>> {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="remember"
                                               id="remember"
                                               {{ old('remember') ? 'checked' : '' }}
                                               style="background: #000; border: 1px solid #00ff00;">

                                        <label class="form-check-label" for="remember" style="color: #00cc00;">
                                            > Запомнить меня
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit"
                                            class="btn btn-primary"
                                            style="background-color: #003300; border-color: #00ff00; color: #00ff00;">
                                        > Войти
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link"
                                           href="{{ route('password.request') }}"
                                           style="color: #00cc00; text-decoration: none;">
                                            > Забыли пароль?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus {
            background-color: #000;
            color: #00ff00;
            border-color: #00ff00;
            box-shadow: 0 0 0 0.25rem rgba(0, 255, 0, 0.25);
        }

        .btn-primary:hover {
            background-color: #00ff00 !important;
            color: #000 !important;
        }

        .btn-link:hover {
            color: #00ff00 !important;
            text-shadow: 0 0 5px rgba(0, 255, 0, 0.5);
        }

        .invalid-feedback {
            display: block;
            margin-top: 0.5rem;
        }
    </style>
@endsection
