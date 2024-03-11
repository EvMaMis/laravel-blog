@extends('adminlte::page')

@section('content_header')
    <div class="col-12">
        <h1>Обновление поста</h1>
    </div>
@endsection
@section('content')
    <div class="container col-12">
        <form action='{{route('admin.posts.update', $post)}}' method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group col-4">
                <input name="title" type="text" class="form-control" placeholder="Название поста" value="{{$post->title}}">
                @error('title')
                <div class="text-danger">Поле обязательно для заполнения</div>
                @enderror
                <input type="submit" class="btn btn-success mt-3" value="Обновить пост">
            </div>
        </form>
    </div>
@endsection