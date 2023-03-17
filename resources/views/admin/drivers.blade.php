@extends('layouts.adminlayout')
@section('content')

    <div class="pt-4 ml-30 pe-3" data-page="drivers">
        <a href="{{ route('add_trip') }}" class="btn btn-success mb-3">Добавить водителя</a>
        <form action="">
            <div class="d-flex mb-3">
                <input class="form-control me-3" type="text" placeholder="Фамилия">
                <input class="form-control me-3" type="text" placeholder="Имя">
                <input class="form-control me-3" type="text" placeholder="Отчество">
                <button class="btn btn-primary">Поиск</button>
            </div>
        </form>

        <form action="">
            <div class="d-flex mb-3">
                <input class="form-control me-3" type="number" placeholder="Поиск по ID">
                <button class="btn btn-primary">Найти</button>
            </div>
        </form>
        @if(count($drivers) == 0)
            Поездок нет
        @else

            @foreach($drivers as $driver)
                <div class="card">
                    <h5 class="card-header">{{$driver->surname}} {{$driver->name}} {{$driver->patronymic}}</h5>
                    <div class="card-body">
                        <p class="card-text"><b>Дата получения ВУ:</b> {{$driver->license_date}}</p>
                        <p class="card-text"><b>Номер ВУ:</b> {{$driver->license_number}}</p>
                        <a href="#" class="btn btn-primary">Редактировать</a>
                    </div>
                </div>



            @endforeach
        @endif

    </div>

@endsection
