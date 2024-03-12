@extends('adminlte::page')

@section('content_header')
    <div class="col-12">
        <h1>Добавление пользователя</h1>
    </div>
@endsection
@section('content')
    <div class="container col-12">
        <form action='{{route('admin.users.store')}}' method="POST">
            @csrf
            <div class="form-group col-4">
                <label for="name" class="form-check-label">Введите имя пользователя</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Имя пользователя...">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="email" class="form-check-label">Введите электронную почту пользователя</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Email...">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="password" class="form-check-label">Введите пароль</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Пароль...">
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="check_password" class="form-check-label">Подтвердите пароль</label>
                <input id="check_password" name="check_password" type="password" class="form-control" placeholder="Подтвердите пароль...">


                <input type="submit" class="btn btn-success mt-3" value="Добавить пользователя">
            </div>

        </form>
    </div>
@endsection
