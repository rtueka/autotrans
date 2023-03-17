@extends('layouts.layouts')
@section('content')
    <div class="content">
        <div class="container mt-5">
            <h3 class="mb-4">Забронировать билет</h3>

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
                    <p class="card-text">Автобус: {{$trip->bus->name}} {{$trip->bus->number}}</p>
                </div>
            </div>

            <?php
                $array = [];
                foreach ($trip->tickets as $ticket){
                    array_push($array, $ticket->place);
                }
                ?>

{{--            @foreach($trip->tickets as $ticket)--}}
{{--                {{ $ticket->place }}--}}

{{--            @endforeach--}}

            <form action="{{ route('buy_ticket', $trip->id) }}" method="POST" class="mb-5" style="width: 40%">
                <h6>Фамилия</h6>
                <input class="form-control" type="text" name="surname" placeholder="Фамилия"><br>
                <h6>Имя</h6>
                <input class="form-control" type="text" name="name" placeholder="Имя"><br>
                <h6>Отчество</h6>
                <input class="form-control" type="text" name="patronymic" placeholder="Отчество"><br>
                <h6>Пол</h6>
                <select name="sex" class="form-select">
                    <option value="Мужской">Мужской</option>
                    <option value="Женский">Женский</option>
                </select> <br>
                <h6>Документ</h6>
                <select name="document_type" class="form-select">
                    <option value="Паспорт РФ">Паспорт РФ</option>
                    <option value="Свидетельство о рождении">Свидетельство о рождении</option>
                    <option value="Военный билет">Военный билет</option>
                    <option value="Временное удостоверение личности">Временное удостоверение личности</option>
                </select> <br>
                <h6>Номер документа</h6>
                <input class="form-control" name="document_number" type="text" placeholder="Номер документа"><br>
                <h6>Тариф</h6>
                <select name="tariff" class="form-select">
                    <option value="Полный">Полный</option>
                    <option value="Детский">Детский</option>
                </select> <br>
                <input type="hidden" name="way_id" value="{{ $way->id }}" >
                @if(Auth::check())
                <input name="user_id" type="hidden"  value="{{Auth::user()->id}}">
                @endif
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Выбрать место
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="select_place">
                                    <table>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="radio" @if(in_array(18, $array)) disabled @endif class="btn-check" name="place"  value="18" id="btnradio18" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio18">18</label>
                                            </td>
                                            <td>
                                                <input type="radio" @if(in_array(19, $array)) disabled @endif class="btn-check" name="place" value="19" id="btnradio19" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio19">19</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" @if(in_array(1, $array)) disabled @endif class="btn-check" name="place" value="1" id="btnradio1" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio1">1</label>
                                            </td>
                                            <td>
                                                <input type="radio" @if(in_array(2, $array)) disabled @endif class="btn-check" name="place" value="2" id="btnradio2" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio2">2</label>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" @if(in_array(3, $array)) disabled @endif class="btn-check" name="place" value="3" id="btnradio3" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio3">3</label>
                                            </td>
                                            <td>
                                                <input type="radio" @if(in_array(4, $array)) disabled @endif class="btn-check" name="place" value="4" id="btnradio4" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio4">4</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="radio" @if(in_array(5, $array)) disabled @endif class="btn-check" name="place" value="5" id="btnradio5" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio5">5</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" @if(in_array(6, $array)) disabled @endif class="btn-check" name="place" value="6" id="btnradio6" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio6">6</label>
                                            </td>
                                            <td>
                                                <input type="radio" @if(in_array(7, $array)) disabled @endif class="btn-check" name="place" value="7" id="btnradio7" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio7">7</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="radio" @if(in_array(8, $array)) disabled @endif class="btn-check" name="place" value="8" id="btnradio8" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio8">8</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" @if(in_array(9, $array)) disabled @endif class="btn-check" name="place" value="9" id="btnradio9" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio9">9</label>
                                            </td>
                                            <td>
                                                <input type="radio" @if(in_array(10, $array)) disabled @endif class="btn-check" name="place" value="10" id="btnradio10" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio10">10</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="radio" @if(in_array(11, $array)) disabled @endif class="btn-check" name="place" value="11" id="btnradio11" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio11">11</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" @if(in_array(12, $array)) disabled @endif class="btn-check" name="place" value="12" id="btnradio12" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio12">12</label>
                                            </td>
                                            <td>
                                                <input type="radio" @if(in_array(13, $array)) disabled @endif class="btn-check" name="place" value="13" id="btnradio13" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio13">13</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="radio" @if(in_array(14, $array)) disabled @endif class="btn-check" name="place" value="14" id="btnradio14" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio14">14</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" @if(in_array(15, $array)) disabled @endif class="btn-check" name="place" value="15" id="btnradio15" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio15">15</label>
                                            </td>
                                            <td>
                                                <input type="radio" @if(in_array(16, $array)) disabled @endif class="btn-check" name="place" value="16" id="btnradio16" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio16">16</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="radio" @if(in_array(17, $array)) disabled @endif class="btn-check" name="place" value="17" id="btnradio17" autocomplete="off">
                                                <label class="btn btn-outline-primary btn-place" for="btnradio17">17</label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @if(Auth::check())
                <button type="submit" class="btn btn-primary">Забронировать</button>
                @else
                    <h6>Чтобы забронировать билет, <a id="myBtn" class="button_null">войдите</a></h6>
                @endif

                @csrf
            </form>

        </div>
    </div>

    <!-- Модальный -->
    <div id="myModal"  class="modal">

        <!-- Модальное содержание -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="login__title">Вход</h2>
            <div class="login__inner">
            <div class="form__box">
                <form method="POST" action="{{ route('login') }}" class="login__form">
                    @csrf
                    <h6>Электронная почта</h6>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <h6>Пароль</h6>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <br>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <button type="submit" class="btn btn-light">Войти</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
