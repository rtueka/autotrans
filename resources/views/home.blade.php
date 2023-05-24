@extends('layouts.layouts')
@section('content')
{{--    {{ dd($_COOKIE) }}--}}

<div class="intro">
    <div class="container">
        <div class="intro__title">
            <h2 class="intro__title__h2">Билеты на автобус по всей России</h2>
        </div>
        <div class="intro__form">
            <form action="{{ route('search') }}" class="intro__form">
                <div class="intro__input">
                    <input type="text" class="form-control" name="fromm" placeholder="Откуда">
                </div>
                <div class="intro__input">
                    <input type="text" class="form-control" name="tto" placeholder="Куда">
                </div>
                <div class="intro__input">
                    <input type="date" class="form-control" name="date" placeholder="Дата">
                </div>
                <div class="intro__btn">
                    <button type="submit" class="btn btn-light">Поиск</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="routes">
        <h2>Популярные направления</h2>
        <div class="routes__inner mt-5">

            <div class="card" style="width: 18rem;">
                <form action="{{ route('search') }}">
                    <input type="text" name="fromm" style="display: none;" value="Москва">
                    <input type="text" name="tto" style="display: none;" value="Санкт-Петербург">
                    <button class="button_null">
                        <img src="/images/sp.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Москва - Санкт-Петербург</h5>
                        </div>
                    </button>
                </form>
            </div>

            <div class="card" style="width: 18rem;">
                <form action="{{ route('search') }}">
                    <input type="text" name="fromm" style="display: none;" value="Санкт-Петербург">
                    <input type="text" name="tto" style="display: none;" value="Москва">
                    <button class="button_null">
                        <img src="/images/kremlin.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Санкт-Петербург - Москва</h5>
                        </div>
                    </button>
                </form>
            </div>

            <div class="card" style="width: 18rem;">
                <form action="{{ route('search') }}">
                    <input type="text" name="fromm" style="display: none;" value="Москва">
                    <input type="text" name="tto" style="display: none;" value="Казань">
                    <button class="button_null">
                    <img src="/images/kazan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Москва - Казань</h5>
                    </div>
                    </button>
                </form>
            </div>

            <div class="card" style="width: 18rem;">
                <form action="{{ route('search') }}">
                    <input type="text" name="fromm" style="display: none;" value="Москва">
                    <input type="text" name="tto" style="display: none;" value="Екатеринбург">
                    <button class="button_null">
                    <img src="/images/ekaterinburg.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Москва - Екатеринбург</h5>
                    </div>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

    <div class="container mt-5 mb-5">
        <div class="auth" id="loginForm">
            <h4>Войти</h4>
            <form method="POST" action="{{ route('login') }}" class="login__form">
                @csrf
                <h6>Электронная почта</h6>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"><br>
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
                <button type="submit" class="btn btn-light mb-3">Войти</button>
                <br>
                <a href="" id="toRegister">Регистрация</a>
            </form>

        </div>

        <div class="auth hide" id="registerForm">
            <h4>Регистрация</h4>
            <form method="POST" action="{{ route('register') }}" class="login__form">
                @csrf
                <h6>Телефон</h6>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
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
                <button type="submit" class="btn btn-light mb-3">Зарегистрироваться</button>
                <br>
                <a href="" id="toLogin">Уже зарегистрированы? Войти</a>
            </form>

        </div>

    </div>

@endsection
