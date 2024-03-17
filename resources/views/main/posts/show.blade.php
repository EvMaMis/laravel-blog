@extends('layouts.main')
@section('head')
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href={{asset("assets/assets/favicon.ico")}}/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
          type="text/css"/>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet"/>
@endsection

@section('page_header')
    <header class="masthead" style="background-image: url({{asset('storage/' . $post->main_image)}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{$post->title}}</h1>
                        <h2 class="subheading">{{$post->category->title}}</h2>
                        <span class="meta d-flex align-items-center ">
                                Опубликовано {{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}} • {{$date->format('H:i')}} • Комментарии: {{$post->comments->count()}} •
                            @auth()
                                <form action="{{route('post.likes.store', $post)}}" method="post">
                                @csrf
                                    @method('post')
                                <button type="submit" class="btn text-white" style="font-size: 16px"><i class="text-white fa{{auth()->user()->likedPosts->contains($post->id) ? 's' : 'r'}} fa-heart"></i> {{$post->liked_users_count}}</button>
                            </form>
                            @endauth
                            @guest
                                <i class=" far fa-heart"></i>{{$post->liked_users_count}}
                            @endguest
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <article class="mb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    {!! $post->content !!}
                </div>
            </div>
            @if(sizeof($relatedPosts) != 0)
                <div class="section-heading mb-3 text-center">Похожие посты</div>
                <div class="row justify-content-center">
                <div class="col-10 row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
                    @foreach($relatedPosts as $relatedPost)
                        <div class="col post">
                            <div class="user-post-image">
                                <img class="img-fluid" src="{{asset('storage/' . $relatedPost->preview_image)}}"
                                     alt="preview image">
                            </div>
                            <div class="user-post-category">
                                <p class="h4" class="user-post-category-text">{{$relatedPost->category->title}}</p>
                            </div>
                            <div class="user-post-title">
                                <h3 class="h3 user-post-title-text"><a
                                        href="{{route('main.posts.show', $relatedPost)}}">{{$relatedPost->title}}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>

            @endif
            <div class="row row-cols-1 justify-content-center">
                <div class="section-heading mb-3 text-center">Комментарии{{$post->comments->count() != 0 ? "(" . $post->comments->count() . ")" : '' }}</div>
                @if($post->comments->count() == 0)
                    <div class="col-10 h2">Здесь пока нет комментариев</div>
                @else
                    @foreach($post->comments as $comment)
                        <div class="col-8 card-comment mb-3">
                            <div class="comment-text">
                                <div class="username">
                                    {{$comment->user->name}}
                                    <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                                </div>
                                {{$comment->message}}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @auth()
                <section class="row comment justify-content-center">
                    <div class="col-10 mb-4">
                        <div class="section-heading mb-3 text-center">Оставить комментарий</div>
                        <form action="{{route('post.comments.store', $post)}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="comment">Введите ваш комментарий</label>
                                    <textarea name="message" id="comment" class="mt-2 form-control"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" value="Отправить комментарий" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            @endauth
        </div>
    </article>
@endsection
