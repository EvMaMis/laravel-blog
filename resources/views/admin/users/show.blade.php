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
            <td class="col-3">ID</td>
            <td class="col-3">{{$user->id}}</td>
        </tr>
        <tr>
            <td class="col-3">Название</td>
            <td class="col-3">{{$user->name}}</td>
        </tr>
        <tr>
            <td class="col-3">Дата создания</td>
            <td class="col-3">{{$user->created_at}}</td>
        </tr>
        <tr>
            <td class="col-3">Дата последнего обновления</td>
            <td class="col-3">{{$user->updated_at}}</td>
        </tr>
    </table>
    <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Назад</a>



@endsection
@section('js')
    <script src="https://kit.fontawesome.com/40087f1b88.js" crossorigin="anonymous"></script>
@endsection
