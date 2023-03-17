@extends('layouts.layouts')
@section('content')
    <div class="content">
        <div class="container">
            <div class="all__routes mt-5 mb-5">
                <h3>Результаты поиска</h3>
                <div class="all__routes__inner mt-4">

                    @if(count($ways) == 0)
                        Поездок по вашему маршруту поездок не найдено
                    @else

                        @foreach($ways as $way)
                            {{--                        {{ dd($way->fromm->station) }}--}}
                            @foreach($way->route->trips as $trip)
                                <div class="card">
                                    <div class="card-header">
                                        <h5>
                                            {{$way->fromm}}
                                            -
                                            {{$way->tto}}
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="card__table mb-2">
                                            <tr>
                                                <td class="card__table__td"><h6>{{$way->fromm}}</h6></td>
                                                <td class="card__table__td"><h6>{{$way->tto}}</h6></td>
                                            </tr>
                                            <tr>
                                                <td class="card__table__td"><h6>{{DateTime::createFromFormat('Y-m-d H:i:s', date_plus($trip->date_from, $way->time_from))->format('d.m.Y H:i')}}</h6></td>
                                                <td class="card__table__td"><h6>{{DateTime::createFromFormat('Y-m-d H:i:s', date_plus($trip->date_from, $way->time_to))->format('d.m.Y H:i')}}</h6></td>
                                            </tr>
                                        </table>
                                        <h5>{{$way->price}} рублей</h5>
                                        <div class="accordion mb-2" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{$trip->id}}">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$trip->id}}" aria-expanded="false" aria-controls="collapse{{$trip->id}}">
                                                        Подробнее о маршруте
                                                    </button>
                                                </h2>
                                                <div id="collapse{{$trip->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$trip->id}}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <h6>{{$way->route->fromm}}</h6>
                                                        @foreach($way->route->stations as $station)
                                                            <h6>{{$station->name }}</h6>
                                                        @endforeach
                                                        <h6>{{$way->route->tto}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('ticket')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                                            <input type="hidden" name="way_id" value="{{ $way->id }}">
                                            <button class="btn btn-primary">Забронировать билет</button>
                                        </form>

{{--                                        <a href="{{ route('ticket', $trip->id) }}" class="btn btn-primary">Забронировать билет</a>--}}
                                        <p class="card-text">Автобус: {{$trip->bus->name}} {{$trip->bus->number}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
