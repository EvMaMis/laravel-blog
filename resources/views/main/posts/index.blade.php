@extends('layouts.main')

@section('head')
    <link rel="icon" type="image/x-icon" href="{{asset('assets/assets/favicon.ico')}}" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
@stop


@section('page_header')
    <header class="masthead" style="background-image: url('{{asset('assets/assets/img/home-bg.jpg')}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Умиротворенность и покой</h1>
                        <span class="subheading">Время сделать перерыв</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach($posts as $post)
                <div class="col post">
                    <div class="user-post-image">
                        <img class="img-fluid" src="{{'storage/' . $post->preview_image}}" alt="preview image">
                    </div>
                    <div class="user-post-category d-flex align-items-center justify-content-between">
                        <p class="h4" class="user-post-category-text">{{$post->category->title}}</p>
                        @auth()
                            <form action="{{route('post.likes.store', $post)}}" method="post">
                                @csrf
                                @method('post')
                                <span>{{$post->liked_users_count}}</span>
                                <button type="submit" class="btn"><i class="fa{{auth()->user()->likedPosts->contains($post->id) ? 's' : 'r'}} fa-heart"></i></button>
                            </form>
                        @endauth
                        @guest()
                            <span>{{$post->liked_users_count}}  <i class="far fa-heart"></i></span>
                        @endguest
                    </div>
                    <div class="user-post-title">
                        <h3 class="h3 user-post-title-text"><a href="{{route('main.posts.show', $post)}}">{{$post->title}}</a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{$posts->links()}}
        </div>
        <div class="row row-cols-2">
            <div class="col">
                <div class="row row-cols-1 row-cols-md-2">
                    @foreach($randomPosts as $post)
                        <div class="col post">
                            <div class="user-post-image">
                                <img class="img-fluid" src="{{'storage/' . $post->preview_image}}" alt="preview image">
                            </div>
                            <div class="post-subtitle">
                                <p class="h4" class="user-post-category-text">{{$post->category->title}}</p>
                            </div>
                            <div class="post-title">
                                <h3 class="h3 user-post-title-text"><a
                                        href="{{route('main.posts.show', $post)}}">{{$post->title}}</a></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="top-heading">Лучшие посты</div>
                <ol>
                    @foreach($topPosts as $post)
                        <li>
                            <img class="img-thumbnail" style="width:25%;" src="{{'storage/' . $post->preview_image}}" alt="preview">
                            <a href="{{route('main.posts.show', $post)}}">{{$post->title}}</a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
