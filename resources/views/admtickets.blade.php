@extends('layouts.layouts')
@section('content')
    <div class="content">
        <div class="container mt-5">
            <h3>Купленные билеты</h3>
            @foreach($tickets as $ticket)
                {{$ticket->surname}}
                {{$ticket->name}}
                {{$ticket->patronymic}}
                {{$ticket->sex}}
                {{$ticket->document_type}}
                {{$ticket->document_number}}
                {{$ticket->place}}
                {{$ticket->tariff}}
                {{$ticket->trip->date_from}}
                {{$ticket->trip->date_to}}
                {{$ticket->trip->route->fromm}}
                {{$ticket->trip->route->tto}}
                {{$ticket->trip->bus->name}}
                {{$ticket->trip->bus->number}}
                <br>
            @endforeach
        </div>
    </div>

@endsection
