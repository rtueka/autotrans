@extends('layouts.layouts')
@section('content')

<div class="login mb-5">
    <div class="container">
        <h2 class="login__title mt-5 mb-4">Регистрация</h2>
        <div class="login__inner">
            <div class="form__box">
                <form action="" class="login__form">
                    <h6>Телефон</h6>
                    <input type="text" class="form-control"><br>
                    <h6>Email</h6>
                    <input type="email" class="form-control"><br>
                    <h6>Пароль</h6>
                    <input type="password" class="form-control"><br>
                    <button type="submit" class="btn btn-light">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
