<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GO</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark position-fixed" style="width: 280px; height: 100%">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img class="header__logo" src="/images/bus_logo.svg" alt="">
            <span class="fs-4">GO</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto" id="links">
            <li class="nav-item">
                <a href="{{route('toPanel')}}" class="nav-link text-white" data-link="main">
                    Главная
                </a>
            </li>
            <li>
                <a href="{{ route('admintrips') }}" class="nav-link text-white" data-link="trips">
                    Рейсы
                </a>
            </li>
            <li>
                <a href="{{ route('drivers') }}" class="nav-link text-white" data-link="drivers">
                    Водители
                </a>
            </li>
            <li>
                <a href="{{ route('auto') }}" class="nav-link text-white" data-link="auto">
                    Автомобили
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white" data-link="routes">
                    Направления
                </a>
            </li>
            <li class="align-content-end">
                <a href="{{ route('home') }}" class="nav-link text-white">
                    <-- На сайт
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <strong>{{ Auth::user()->email}}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>

    <div class="">
        @yield('content')
    </div>


<script src="/bootstrap/js/bootstrap.js"></script>
<script src="/js/pages.js"></script>
</body>
</html>
