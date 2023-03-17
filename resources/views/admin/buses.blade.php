@extends('layouts.adminlayout')
@section('content')

    <div class="pt-4 ml-30 pe-3" data-page="auto">
        <a href="{{ route('add_trip') }}" class="btn btn-success mb-3">Добавить автомобиль</a>
        <form action="">
            <div class="d-flex mb-3">
                <input class="form-control me-3" type="text" placeholder="Номер автомобиля">
                <button class="btn btn-primary">Поиск</button>
            </div>
        </form>

        <form action="">
            <div class="d-flex mb-3">
                <input class="form-control me-3" type="number" placeholder="Поиск по ID">
                <button class="btn btn-primary">Найти</button>
            </div>
        </form>
        @if(count($buses) == 0)
            Поездок нет
        @else

            @foreach($buses as $bus)
                <div class="card">
                    <h5 class="card-header">{{$bus->name}} {{$bus->number}}</h5>
{{--                    <div class="card-body">--}}
{{--                        <p class="card-text"><b>Дата получения ВУ:</b> {{$driver->license_date}}</p>--}}
{{--                        <p class="card-text"><b>Номер ВУ:</b> {{$driver->license_number}}</p>--}}
{{--                        <a href="#" class="btn btn-primary">Редактировать</a>--}}
{{--                    </div>--}}
                </div>



            @endforeach
        @endif

    </div>

@endsection

