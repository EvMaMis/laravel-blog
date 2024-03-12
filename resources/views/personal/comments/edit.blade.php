@extends('adminlte::page')
@section('content_header')
    <h1 class="text-center mb-3">Редактирование комментария</h1>
@endsection

@section('content')
    <form action='{{route('personal.comments.update', $comment)}}' method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group col-4">
            <textarea class="input-group" name="message" id="message">{{$comment->message}}</textarea>
            @error('message')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <input type="submit" class="btn btn-success mt-3" value="Обновить комментарий">
        </div>
    </form>
@endsection
