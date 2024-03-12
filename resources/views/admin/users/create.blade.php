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
                <input value="{{old('name')}}" id="name" name="name" type="text" class="form-control" placeholder="Имя пользователя...">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="email" class="form-check-label">Введите электронную почту пользователя</label>
                <input value="{{old('email')}}" id="email" name="email" type="email" class="form-control" placeholder="Email...">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="role_select">Выберите роль</label>
                    <select name="role" id="role_select" class="form-control w-50">
                        @foreach($roles as $id=>$role)
                            <option value="{{$id}}"
                                {{$id == old('role') ? 'selected' : ''}}
                            >{{$role}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <input type="submit" class="btn btn-success mt-3" value="Добавить пользователя">
            </div>

        </form>
    </div>
@endsection
