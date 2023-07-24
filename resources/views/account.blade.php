@extends('layouts.layouts')
@section('content')
    <div class="content">
        <div class="container mt-5 mb-5">
            @if (Auth::check() and Auth::user()->role_id == 2)
                <a class="btn btn-primary" href="{{ route('toPanel') }}">Админ-панель</a> <br>

            @endif
            <a href="{{ route('logout') }}">Выйти из аккаунта</a><br>
            Телефон: {{Auth::user()->phone}} <br>
            Электронная почта: {{Auth::user()->email}}
            <h3 class="mb-3 mt-3">Мои билеты</h3>
            @foreach($tickets as $ticket)

                <div class="card">
                    <div class="card-header">
                        <h5>
                            {{$ticket->way->fromm}}
                            -
                            {{$ticket->way->tto}}
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="card__table mb-2">
                            <tr>
                                <td class="card__table__td"><h6>{{$ticket->way->fromm}}</h6></td>
                                <td class="card__table__td"><h6>{{$ticket->way->tto}}</h6></td>
                            </tr>
                            <tr>
                                <td class="card__table__td"><h6>{{DateTime::createFromFormat('Y-m-d H:i:s', date_plus($ticket->trip->date_from, $ticket->way->time_from))->format('d.m.Y H:i')}}</h6></td>
                                <td class="card__table__td"><h6>{{DateTime::createFromFormat('Y-m-d H:i:s', date_plus($ticket->trip->date_from, $ticket->way->time_to))->format('d.m.Y H:i')}}</h6></td>
                            </tr>
                        </table>
                        <span class="account_text">ФИО:</span>
                        {{$ticket->surname}}
                        {{$ticket->name}}
                        {{$ticket->patronymic}}<br>
                        <span class="account_text">Пол:</span>
                        {{$ticket->sex}}<br>
                        <span class="account_text">Документ:</span>
                        {{$ticket->document_type}}<br>
                        <span class="account_text">Номер документа:</span>
                        {{$ticket->document_number}}<br>
                        <span class="account_text">Место:</span>
                        {{$ticket->place}}<br>
                        <span class="account_text">Тариф:</span>
                        {{$ticket->tariff}}<br><br>
                        <h5>{{$ticket->way->price}} рублей</h5>
                        <div class="accordion mb-2" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$ticket->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$ticket->id}}" aria-expanded="false" aria-controls="collapse{{$ticket->id}}">
                                        Подробнее о маршруте
                                    </button>
                                </h2>
                                <div id="collapse{{$ticket->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$ticket->id}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{--                                {{ dd($post->comments) }}--}}
                                        <h5>{{$ticket->trip->route->fromm}}</h5>
                                        @foreach($ticket->trip->route->stations as $station)
                                            <h5>{{$station->name }}</h5>
                                        @endforeach
                                        <h5>{{$ticket->trip->route->tto}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">Автобус: {{$ticket->trip->bus->name}} {{$ticket->trip->bus->number}}</p>
                        <form action="{{ route('pdf') }}">
                            <input type="text" name="ticket_id" value="{{$ticket->id}}" style="display: none">
                            <button type="submit" class="btn btn-dark">Скачать билет</button>
                        </form>

                        <form action="{{ route('deleteTicket', $ticket->id) }}" method="post" class="mt-2">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                            <button type="submit" class="btn btn-outline-danger">Отменить бронь</button>
                        </form>
                    </div>
                </div>

            @endforeach


{{--            <a href="{{ route('ticketExport') }}">TicketExport</a>--}}
        </div>
    </div>
@endsection
