@extends('adminlte::page')
@section('content_header')
    <h1 class="text-center mb-3">Главная</h1>
@endsection

@section('content')
    <table class="table col-12">
        <thead>
        <tr>
            <th class="col-3">ID</th>
            <th class="col-7">Комментарий</th>
            <th class="col-2 text-center" colspan="2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td class="col-3">{{$comment->id}}</td>
                <td class="col-7">{{$comment->message}}</td>
                <td class="col-1"><a href="{{route('personal.comments.edit', $comment)}}">
                        <i class="text-center text-success fas fa-solid fa-pen"></i></a></td>
                <td class="col-1">
                    <form action="{{route('personal.comments.destroy', $comment)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border:0; background:transparent;">
                            <i class="text-center text-danger fas fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
