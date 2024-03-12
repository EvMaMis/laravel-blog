@extends('adminlte::page')
@section('content_header')
    <h1 class="text-center mb-3">Главная</h1>
@endsection

@section('content')
    <table class="table col-12">
        <thead>
        <tr>
            <th class="col-3">ID</th>
            <th class="col-7">Название поста</th>
            <th class="col-2 text-center" colspan="2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td class="col-3">{{$post->id}}</td>
                <td class="col-7">{{$post->title}}</td>
                <td class="col-1"><a href="{{route('admin.posts.show', $post)}}">
                        <i class="text-center text-blue fas fa-solid fa-eye"></i></a></td>
                <td class="col-1">
                    <form action="{{route('personal.likes.destroy', $post)}}" method="POST">
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
