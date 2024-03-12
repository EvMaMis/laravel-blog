@extends('adminlte::page')
@section('content_header')
    <h1 class="text-center mb-3">Главная</h1>
@endsection

@section('content')
    <div class="d-flex justify-content-between">

    <x-adminlte-small-box style="width:45%;" title="Публикации" text="" icon="fas fa-solid fa-scroll"
                          theme="primary" url="{{route('admin.posts.index')}}" url-text="Подробнее"/>

    <x-adminlte-small-box style="width:45%;" title="Пользователи" text="" icon="fas fa-solid fa-user"
                          theme="purple" url="{{route('admin.users.index')}}" url-text="Подробнее"/>
    </div>
    <div class="d-flex justify-content-between">

    <x-adminlte-small-box style="width: 45%;" title="Категории" text="" icon="fas fa-solid fa-list"
                          theme="gray" url="{{route('admin.categories.index')}}" url-text="Подробнее"/>

    <x-adminlte-small-box style="width: 45%;" title="Теги" text="" icon="fas fa-solid fa-tags"
                          theme="danger" url="{{route('admin.tags.index')}}" url-text="Подробнее"/>
    </div>
@endsection
