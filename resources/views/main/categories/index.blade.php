<ul>
    @foreach($categories as $category)
        <li><a href="{{route('main.categories.show', $category)}}">{{$category->title}}</a></li>
    @endforeach
</ul>

