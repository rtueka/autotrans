@extends('layouts.adminlayout')
@section('content')

    <div class="pt-4 ml-30 pe-3" data-page="trips">
        <a href="{{ route('add_trip') }}" class="btn btn-success mb-3">Добавить рейс</a>
        <form action="{{route('adminTripSearch')}}" method="post">
            <div class="d-flex mb-3">
                @csrf
                <input class="form-control me-3" type="text" placeholder="Откуда" name="fromm">
                <input class="form-control me-3" type="text" placeholder="Куда" name="tto">
                <input class="form-control me-3" type="date" placeholder="Дата" name="date">
                <button class="btn btn-primary">Поиск</button>
            </div>
        </form>

        <form action="{{route('adminTripSearch')}}" method="post">
        <div class="d-flex mb-3" >
            @csrf
            <input name="id" class="form-control me-3" type="number" placeholder="Поиск по ID">
            <button class="btn btn-primary">Найти</button>
        </div>
        </form>


        @if(count($trips) == 0)
            Поездок нет
        @else

            @foreach($trips as $trip)
{{--                {{ dd($trip->route->stations)  }}--}}

                <div class="card">
                    <div class="card-header">
                        <h5>
                            {{$trip->route->fromm}}
                            -
                            {{$trip->route->tto}}

                            id:{{$trip->id}}
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="card__table mb-2">
                            <tr>
                                <td class="card__table__td"><h6>{{$trip->route->fromm}}</h6></td>
                                <td class="card__table__td"><h6>{{$trip->route->tto}}</h6></td>
                            </tr>
                            <tr>
                                <td class="card__table__td"><h6>{{$trip->date_from}}</h6></td>
                                <td class="card__table__td"><h6>{{$trip->date_to}}</h6></td>
                            </tr>
                        </table>



                        <div class="accordion mb-2" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$trip->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$trip->id}}" aria-expanded="false" aria-controls="collapse{{$trip->id}}">
                                        Подробнее о маршруте
                                    </button>
                                </h2>
                                <div id="collapse{{$trip->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$trip->id}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
        {{--                                {{ dd($post->comments) }}--}}
                                        <h5>{{$trip->route->fromm}}</h5>
                                        @foreach($trip->route->stations as $station)
                                            <h5>{{$station->name }}</h5>
                                        @endforeach
                                        <h5>{{$trip->route->tto}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>



{{--                        <a href="{{ route('ticket', $trip->id) }}" class="btn btn-primary">Забронировать билет</a>--}}
{{--                        <a href="{{ route('ticket', $trip->id) }}" class="btn btn-warning">Редактировать</a>--}}
                        <form action="{{ route('list') }}" method="post">
                            @csrf
                            <input type="hidden" name="trip_id" value="{{$trip->id}}">
                            <button class="btn btn-primary">Маршрутный лист</button>
                        </form>
{{--                        <a href="{{ route('ticket', $trip->id) }}" class="btn btn-danger">Удалить</a>--}}
                        <p class="card-text">Автобус: {{$trip->bus->name}} {{$trip->bus->number}}</p>
                    </div>
                </div>

            @endforeach
        @endif

    </div>


@endsection
