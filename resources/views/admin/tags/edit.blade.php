@extends('adminlte::page')

@section('content_header')
    <div class="col-12">
        <h1>Обновление тега</h1>
    </div>
@endsection
@section('content')
    <div class="container col-12">
        <form action='{{route('admin.tags.update', $tag)}}' method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group col-4">
                <input name="title" type="text" class="form-control" placeholder="Название тега" value="{{$tag->title}}">
                @error('title')
                <div class="text-danger">Поле обязательно для заполнения</div>
                @enderror
                <input type="submit" class="btn btn-success mt-3" value="Обновить тег">
            </div>
        </form>
    </div>
@endsection
