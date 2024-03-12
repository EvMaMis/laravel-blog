@extends('adminlte::page')
@section('content_header')
    <div class="container">
        <h1>Добавление поста</h1>
    </div>


@endsection

@section('content')
    <div class="">
        <form action='{{route('admin.posts.store')}}' method="POST" class="container" enctype="multipart/form-data">
            @csrf
            <div class="form-group w-50">
                <input name="title" type="text" class="form-control" placeholder="Название поста" value="{{old('title')}}">
                @error('title')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="summernote" class="form-label">Some content</label>
                <textarea name="content" id="summernote">{{old('content')}}</textarea>
                @error('content')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label class="form-label">Добавить превью</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input class="custom-file-input" type="file" id="input-preview" name="preview_image">
                        <label class="custom-file-label" for="input-preview">Выберите изображение</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Загрузить</span>
                    </div>
                </div>
                @error('preview_image')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label class="form-label">Добавить главное изображение</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input class="custom-file-input" type="file" id="input-main" name="main_image">
                        <label class="custom-file-label" for="input-main">Выберите изображение</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Загрузить</span>
                    </div>
                </div>
                @error('main_image')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_pick">Выберите категорию</label>
                <select name="category_id" id="category_pick" class="form-control w-50">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            {{$category->id == old('category_id') ? 'selected' : ''}}
                        >{{$category->title}}</option>
                    @endforeach
                </select>

                @error('category_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="tags">Выберите теги</label>
                <select id="tags" class="js-example-basic-multiple js-states form-control" name="tag_ids[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option
                            {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}}
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                @error('tag_ids')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-outline-success mb-5" value="Добавить пост">
        </form>
    </div>
@endsection

@section('js')
<script>

    $(document).ready(function(){
        $('#summernote').summernote({
            placeholder: 'Содержимое поста',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    })
    $(function() {
        bsCustomFileInput.init();
    })
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    $.fn.select2.defaults.set("theme", "classic");

</script>
@endsection

