<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GO</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="head">
    <div class="container">
        <header class="header">
            <a href="{{ route('home') }}" class="header__logo__text">
                <img class="header__logo" src="/images/bus_logo.svg" alt="">
                <h3 class="account__text">GO</h3>
            </a>
            <h4 class="header__logo__text account__text">Автотранспортная компания</h4>

            @if(!Auth::check())
            <a href="{{ route('login') }}" class="header__logo__text">
                <img class="header__logo account" src="/images/account.svg" alt="">
                <h6 class="account__text">Вход в аккаунт</h6>
            </a>
            @endif

            @if(Auth::check())
                <a href="{{ route('account') }}" class="header__logo__text">
                    <img class="header__logo account" src="/images/account.svg" alt="">
                    <h6 class="account__text">{{Auth::user()->phone}}</h6>
                </a>
            @endif
        </header>
    </div>
</div>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__block">
                <a href="{{ route('home') }}" class="footer__a"><h6>Главная</h6></a>
                <a href="{{ route('login') }}" class="footer__a"><h6>Вход/регистрация</h6></a>
{{--                <a href="{{ route('rout') }}" class="footer__a"><h6>Все рейсы</h6></a>--}}
{{--                <a href="{{ route('admtickets') }}" class="footer__a"><h6>Купленные билеты</h6></a>--}}
                <a href="{{ route('account') }}" class="footer__a"><h6>Возврат билетов</h6></a>
                <a href="" class="footer__a"><h6>Помощь</h6></a>
            </div>
            <div class="footer__block">
                <h6>О нас</h6>
                <p>Мы применяем только высокотехнологичные методы работы, чтобы нашим клиентам было максимально комфортно и безопасно во время перевозки. Нашим приоритетом является удовлетворенность наших клиентов и мы работаем над этим каждый день. Каждый из наших сотрудников - профессионал высокого уровня, который готов оказать качественную услугу вам и вашим близким.</p>
            </div>
            <div class="footer__block">
                <h6>Документы</h6>
                <a href="" class="footer__a">Политика конфиденциальности</a>
                <a href="" class="footer__a">Пользовательское соглашение</a>
                <a href="" class="footer__a">Договор оферты</a>
            </div>

            <div class="footer__block">
                <h6>Все права защищены ©</h6>
                <h6>All rights reserved</h6>
            </div>

        </div>
    </div>
</footer>

<script src="/bootstrap/js/bootstrap.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
