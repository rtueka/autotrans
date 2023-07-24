@extends('layouts.layouts')
@section('content')

    <div class="login mb-5">
        <div class="container">
            <h2 class="login__title mt-5 mb-4">Вход</h2>
            <div class="login__inner">
                <div class="form__box">
                    <form method="POST" action="{{ route('login') }}" class="login__form">
                        @csrf
                        <h6>Электронная почта</h6>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <h6>Пароль</h6>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <br>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <button type="submit" class="btn btn-light">Войти</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <h2 class="login__title mt-5 mb-4">Регистрация</h2>
            <div class="login__inner">
                <div class="form__box">
                    <form method="POST" action="{{ route('register') }}" class="login__form">
                        @csrf
                        <h6>Телефон</h6>
                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                        <br>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <h6>Email</h6>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <br>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <h6>Пароль</h6>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <br>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <h6>Повтор пароля</h6>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <br>
                        <button type="submit" class="btn btn-light">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
