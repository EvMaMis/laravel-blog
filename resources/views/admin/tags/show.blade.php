@extends('adminlte::page')

@section('content_header')
    <div class="col-12 d-flex align-items-center">
        <h1>{{$tag->title}}</h1>
        <a class="ml-2" href="{{route('admin.tags.edit', $tag)}}">
            <i class="text-center text-green fa-solid fa-pen"></i></a>
        <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
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
            <td class="col-3">{{$tag->id}}</td>
        </tr>
        <tr>
            <td class="col-3">Название</td>
            <td class="col-3">{{$tag->title}}</td>
        </tr>
        <tr>
            <td class="col-3">Дата создания</td>
            <td class="col-3">{{$tag->created_at}}</td>
        </tr>
        <tr>
            <td class="col-3">Дата последнего обновления</td>
            <td class="col-3">{{$tag->updated_at}}</td>
        </tr>
    </table>
    <a href="{{route('admin.tags.index')}}" class="btn btn-primary">Назад</a>



@endsection
@section('js')
    <script src="https://kit.fontawesome.com/40087f1b88.js" crossorigin="anonymous"></script>
@endsection
