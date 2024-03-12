@extends('adminlte::page')

@section('content_header')
    <div class="col-12 d-flex align-items-center">
        <h1>{{$user->name}}</h1>
        <a class="ml-2" href="{{route('admin.users.edit', $user)}}">
            <i class="text-center text-green fa-solid fa-pen"></i></a>
        <form action="{{route('admin.users.destroy', $user)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="border:0; background:transparent;">
                <i class="text-center text-danger fa-solid fa-trash"></i>
            </button>
        </form>
    </div>
@endsection
@section('content')
    <table class="table">
        <tr>
            <th class="col-3">ID</th>
            <td class="col-3">{{$user->id}}</td>
        </tr>
        <tr>
            <th class="col-3">Имя</th>
            <td class="col-3">{{$user->name}}</td>
        </tr>
        <tr>
            <th class="col-3">Электронная почта</th>
            <td class="col-3">{{$user->email}}</td>
        </tr>
        <tr>
            <th class="col-3">Роль</th>
            <td class="col-3">
                @foreach($roles as $key=>$role)
                    {{$key == $user->role ? $role : ''}}
                @endforeach
            </td>
        </tr>
        <tr>
            <th class="col-3">Дата создания</th>
            <td class="col-3">{{$user->created_at}}</td>
        </tr>
        <tr>
            <th class="col-3">Дата последнего обновления</th>
            <td class="col-3">{{$user->updated_at}}</td>
        </tr>
    </table>
    <a href="{{route('admin.users.index')}}" class="btn btn-primary">Назад</a>

@endsection
@section('js')
    <script src="https://kit.fontawesome.com/40087f1b88.js" crossorigin="anonymous"></script>
@endsection
