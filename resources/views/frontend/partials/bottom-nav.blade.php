<div class="bottom_nav">
    <ul>
        @foreach ($categoriesGlobal as $category)
            <li><a href="{{route('search', ['category' => $category->slug])}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</div>
