@extends('layouts.adminlayout')
@section('content')

    <div class="pt-4 ml-30 pe-3" data-page="drivers">
        <h2 class="mb-4">Добавить водителя</h2>
        <form action="{{ route('do_add_driver') }}" method="post">
            @csrf
            <p>Имя</p>
            <input name="name" type="text" class="form-control mb-3">

            <p>Фамилия</p>
            <input name="surname" type="text" class="form-control mb-3">

            <p>Отчество</p>
            <input name="patronymic" type="text" class="form-control mb-3">

            <p>Дата рождения</p>
            <input name="birthday" type="date" class="form-control mb-3">

            <p>Дата получения водительского удостоверения</p>
            <input name="license_date" type="date" class="form-control mb-3">

            <p>Номер водительского удостоверения</p>
            <input name="license_number" type="text" class="form-control mb-3">

            <button class="btn btn-primary">Добавить</button>
        </form>
    </div>

@endsection
