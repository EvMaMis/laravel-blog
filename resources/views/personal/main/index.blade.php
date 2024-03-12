@extends('adminlte::page')
@section('content_header')
    <h1 class="text-center mb-3">Главная</h1>
@endsection

@section('content')
    <div class="d-flex justify-content-between">
    <x-adminlte-small-box style="width:45%;" title="Понравившиеся посты" text="{{$data['count-likes']}}" icon="fas fa-solid fa-heart"
                          theme="danger" url="{{route('personal.likes.index')}}" url-text="Подробнее"/>

    <x-adminlte-small-box style="width:45%;" title="Комментарии" text="{{$data['count-comments']}}" icon="fas fa-solid fa-comment"
                          theme="purple" url="{{route('personal.comments.index')}}" url-text="Подробнее"/>
    </div>
@endsection
