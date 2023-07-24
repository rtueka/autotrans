<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        <?php require_once "css/style.css"?>
        <?php require_once "bootstrap/css/bootstrap.css"?>
        body{
            font-family: "DejaVu Sans", sans-serif !important;
        }

    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <p style="font-family: 'DejaVu Sans', sans-serif !important;">
                {{$ticket->way->fromm}}
                -
                {{$ticket->way->tto}}
            </p>
        </div>
        <div class="card-body">
            <table class="card__table mb-2">
                <tr>
                    <td class="card__table__td"><p>{{$ticket->way->fromm}}</p></td>
                    <td class="card__table__td"><p>{{$ticket->way->tto}}</p></td>
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
            <p>{{$ticket->way->price}} рублей</p>
            <p class="card-text">Автобус: {{$ticket->trip->bus->name}} {{$ticket->trip->bus->number}}</p>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->encoding('UTF-8')->generate("{$ticket->trip->date_from} {$ticket->surname} {$ticket->name} {$ticket->patronymic} Место {$ticket->place} token {$ticket->id}")) !!} ">
        </div>
    </div>
    <form action="{{ route('pdf') }}">
        <input type="text" name="ticket_id" value="{{$ticket->id}}" hidden>
{{--        <button type="submit" class="btn btn-dark">Скачать билет</button>--}}
    </form>


</body>
</html>
