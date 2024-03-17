@extends('adminlte::page')

@section('content_header')
    <div class="col-12">
        <h1>Публикации</h1>
    </div>
@endsection
@section('content')
    <div class="container col-12">
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-3">Добавить пост</a>
    </div>
    <table class="table col-12">
        <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-6">Название тега</th>
            <th class="col-3">Дата создания</th>
            <th class="col-3 text-center" colspan="3">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key=>$post)
            <tr>
                <td class="col-1">{{$key+1}}</td>
                <td class="col-6">{{$post->title}}</td>
                <td class="col-3">{{$post->created_at}}</td>
                <td class="col-1"><a href="{{route('admin.posts.show', $post)}}">
                        <i class="text-center text-blue fa-solid fa-eye"></i></a></td>
                <td class="col-1"><a href="{{route('admin.posts.edit', $post)}}">
                        <i class="text-center text-green fa-solid fa-pen"></i></a></td>
                <td class="col-1">
                    <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
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
