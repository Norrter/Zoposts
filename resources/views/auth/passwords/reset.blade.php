@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #000; border: 1px solid #00ff00; box-shadow: 0 0 15px rgba(0, 255, 0, 0.3);">
                    <div class="card-header" style="background: #000; border-bottom: 1px solid #00ff00; color: #00ff00; font-size: 1.25rem;">
                        > Сброс пароля
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end" style="color: #00cc00;">
                                    > Email
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ $email ?? old('email') }}"
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
                                    > Новый пароль
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           required
                                           autocomplete="new-password"
                                           style="background: #000; border: 1px solid #00ff00; color: #00ff00;">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="color: #ff5555;">
                                        <strong>> {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="color: #00cc00;">
                                    > Подтвердите пароль
                                </label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                           class="form-control"
                                           name="password_confirmation"
                                           required
                                           autocomplete="new-password"
                                           style="background: #000; border: 1px solid #00ff00; color: #00ff00;">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"
                                            class="btn btn-primary"
                                            style="background-color: #003300; border-color: #00ff00; color: #00ff00;">
                                        > Сбросить пароль
                                    </button>
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
    </style>
@endsection
