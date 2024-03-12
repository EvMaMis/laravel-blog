@extends('adminlte::page')

@section('content_header')
    <div class="col-12">
        <h1>Обновление пользователя</h1>
    </div>
@endsection
@section('content')
    <div class="container col-12">
        <form action='{{route('admin.users.update', $user)}}' method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group col-4">
                <input name="name" type="text" class="form-control" placeholder="Имя пользователя" value="{{$user->name}}">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input name="email" type="text" class="form-control" placeholder="Почта пользователя" value="{{$user->email}}">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="submit" class="btn btn-success mt-3" value="Обновить пользователя">
            </div>
        </form>
    </div>
@endsection
