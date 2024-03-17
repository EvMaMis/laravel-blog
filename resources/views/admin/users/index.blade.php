@extends('adminlte::page')

@section('content_header')
    <div class="col-12">
        <h1>Пользователи</h1>
    </div>
@endsection
@section('content')
    <div class="container col-12">
        <a href="{{route('admin.users.create')}}" class="btn btn-primary mb-3">Добавить пользователя</a>
    </div>
    <table class="table col-12">
        <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-3">Имя пользователя</th>
            <th class="col-3">Адрес электронной почты</th>
            <th class="col-3">Роль</th>
            <th class="col-3 text-center" colspan="3">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key=>$user)
            <tr>
                <td class="col-1">{{$key+1}}</td>
                <td class="col-3">{{$user->name}}</td>
                <td class="col-3">{{$user->email}}</td>
                <td class="col-3">
                    @foreach($roles as $key=>$role)
                        {{$key == $user->role ? $role : ''}}
                    @endforeach
                </td>
                <td class="col-1"><a href="{{route('admin.users.show', $user)}}">
                        <i class="text-center text-blue fa-solid fa-eye"></i></a></td>
                <td class="col-1"><a href="{{route('admin.users.edit', $user)}}">
                        <i class="text-center text-green fa-solid fa-pen"></i></a></td>
                <td class="col-1">
                    <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border:0; background:transparent;">
                            <i class="text-center text-danger fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('js')
    <script src="https://kit.fontawesome.com/40087f1b88.js" crossorigin="anonymous"></script>
@endsection
