<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        <?php require_once "./css/style.css"?>
        <?php require_once "./bootstrap/css/bootstrap.css"?>
        body{
            font-family: "DejaVu Sans", sans-serif !important;
        }

    </style>
</head>
<body>
        Маршрут: {{ $trip->route->fromm }} - {{ $trip->route->tto}}<br>

        Дата отправления: {{DateTime::createFromFormat('Y-m-d H:i:s', $trip->date_from)->format('d.m.Y H:i')}}
        <table class="card__table mb-2" style="border: 1px solid black">
            <tr style="border: 1px solid black">
                <td class="card__table__td"><p>ФИО</p></td>
                <td class="card__table__td"><p>Номер документа</p></td>
                <td class="card__table__td"><p>Пол</p></td>
                <td class="card__table__td"><p>Место</p></td>
                <td class="card__table__td"><p>Тариф</p></td>
                <td class="card__table__td"><p>Маршрут</p></td>
            </tr>
            @foreach($tickets as $ticket)
                <tr style="border: 1px solid black">
                    <td class="card__table__td"><p>{{$ticket->surname}} {{$ticket->name}} {{$ticket->patronymic}}</p></td>
                    <td class="card__table__td"><p>{{$ticket->document_number}}</p></td>
                    <td class="card__table__td"><p>{{$ticket->sex}}</p></td>
                    <td class="card__table__td"><p>{{$ticket->place}}</p></td>
                    <td class="card__table__td"><p>{{$ticket->tariff}}</p></td>
                    <td class="card__table__td"><p>{{$ticket->way->fromm}} {{$ticket->way->tto}}</p></td>
                </tr>
            @endforeach
        </table>


</body>
</html>
