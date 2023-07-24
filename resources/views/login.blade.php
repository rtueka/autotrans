@extends('layouts.layouts')
@section('content')

<div class="login mb-5">
    <div class="container mb-5">
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
                    <p class="mt-3">Нет аккаунта? <a href="{{ route('register') }}">Регистрация</a></p>
                </form>
            </div>
        </div>
    </div>


</div>

@endsection
