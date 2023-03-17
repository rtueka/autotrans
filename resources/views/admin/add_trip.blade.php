@extends('layouts.adminlayout')
@section('content')

    <div class="pt-4 ml-30 pe-3" data-page="trips">
        <h2 class="mb-4">Добавить рейс</h2>
        <form action="{{ route('do_add_trip') }}" method="post">
            @csrf
            <p>Время отправления</p>
            <input name="date_from" type="datetime-local" class="form-control mb-3">
            <p>Время прибытия</p>
            <input name="date_to" type="datetime-local" class="form-control mb-3">
            <p>Абобус</p>
            <select name="bus" id="" class="form-select mb-3">
                @foreach($buses as $bus)
                    <option value="{{$bus->id}}">{{$bus->name}}</option>
                @endforeach
            </select>
            <p>Направление</p>
            <select name="route" id="" class="form-select mb-3">
                @foreach($routes as $route)
                    <option value="{{$route->id}}">{{$route->fromm}} - {{$route->tto}}</option>
                @endforeach
            </select>
            <p>Водитель</p>
            <select name="driver" id="" class="form-select mb-3">
                @foreach($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->surname}} {{$driver->name}} {{$driver->patronymic}}</option>
                @endforeach
            </select>
            <p>Цена билета</p>
            <input name="price" type="number" class="form-control mb-3">

            <button class="btn btn-primary">Добавить</button>
        </form>
    </div>

@endsection
