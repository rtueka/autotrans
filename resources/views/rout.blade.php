@extends('layouts.layouts')
@section('content')
<div class="content">
    <div class="container">
        <div class="all__routes mt-5 mb-5">
            <h3>Все рейсы</h3>
            <div class="all__routes__inner mt-4">
                <?php
                echo date_plus($array);
                ?>

{{--                @foreach($data as $trip)--}}

{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h5>--}}
{{--                        {{$trip->route->fromm}}--}}
{{--                        ---}}
{{--                        {{$trip->route->tto}}--}}
{{--                        </h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="card__table mb-2">--}}
{{--                            <tr>--}}
{{--                                <td class="card__table__td"><h6>{{$trip->route->fromm}}</h6></td>--}}
{{--                                <td class="card__table__td"><h6>{{$trip->route->tto}}</h6></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="card__table__td"><h6>{{$trip->date_from}}</h6></td>--}}
{{--                                <td class="card__table__td"><h6>{{$trip->date_to}}</h6></td>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                        <h5>{{$trip->price}} рублей</h5>--}}
{{--                        <a href="{{ route('ticket', $trip->id) }}" class="btn btn-primary">Забронировать билет</a>--}}
{{--                        <p class="card-text">Автобус: {{$trip->bus->name}} {{$trip->bus->number}}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                @endforeach--}}

            </div>
        </div>
    </div>
</div>








@endsection
