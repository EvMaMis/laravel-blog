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
    <header class="masthead" style="background-image: url('{{asset('assets/assets/img/home-bg.jpg')}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="text-center main-page-heading">
                        <div class="h1">Забудь о своих проблемах</div>
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
                <!-- Gallery item -->
                <div class="col mb-3">
                    <div class="bg-white rounded shadow-sm"><img src="{{asset('storage/' . $post->preview_image)}}"
                                                                 alt="" class="img-fluid card-img-top">
                        <div class="p-4">
                            <h5><a href="{{route('main.posts.show', $post)}}" class="text-dark">{{\Illuminate\Support\Str::limit($post->title, 30, '...')}}</a>
                            </h5>
                            <p class="small text-muted mb-0">{{$post->category->title}}</p>
                            <div>
                            @auth()
                                <form action="{{route('post.likes.store', $post)}}" method="post">
                                    @csrf
                                    @method('post')
                                    <span>{{$post->liked_users_count}}</span>
                                    <button type="submit" class="btn"><i
                                            class="fa{{auth()->user()->likedPosts->contains($post->id) ? 's' : 'r'}} fa-heart"></i>
                                    </button>
                                </form>
                            @endauth
                            @guest()
                                <span>{{$post->liked_users_count}}  <i class="far fa-heart"></i></span>
                            @endguest
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{$posts->links()}}
        </div>
        <div class="row row-cols-2 justify-content-between">
            <div class="col">
                <div class="row row-cols-1 row-cols-md-2">
                    @foreach($randomPosts as $post)
                        <div class="col post">
                            <div class="user-post-image">
                                <img class="img-fluid" src="{{asset('storage/' . $post->preview_image)}}"
                                     alt="preview image">
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
                <div class="">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-lg-8">
                            <h6 class="text-muted">Лучшие публикации</h6>
                            <ol class="list-group">
                                @foreach($topPosts as $post)
                                    <li class="row list-group-item d-flex justify-content-between align-items-center">
                                        <a class="col-8" style="text-decoration: none;"
                                           href="{{route('main.posts.show', $post)}}"><span>{{$post->title}}</span></a>
                                        <div class="col-4 image-parent">
                                            <img src="{{asset('storage/' . $post->preview_image)}}" class="img-fluid"
                                                 alt="quixote">
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
