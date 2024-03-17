@extends('layouts.main')
@section('head')
    <link rel="icon" type="image/x-icon" href="{{asset('assets/assets/favicon.ico')}}"/>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet"/>
    <title>Clean Blog - Start Bootstrap Theme</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
@stop

@section('page_header')
    <header class="masthead"
            style="background-image: url('{{asset('assets/assets/img/home-bg.jpg')}}'); margin-top: -20px;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="text-center main-page-heading">
                        <div class="h1">Категории</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="container">

        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item"><a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                        href="{{route('main.categories.show', $category)}}">{{$category->title}}</a></li>
            @endforeach
        </ul>
        <div class="d-flex justify-content-center mt-3">
        {{$categories->links()}}
        </div>
    </div>
@endsection

