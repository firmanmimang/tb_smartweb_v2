<div class="bottom_nav">
    <ul>
        @foreach ($categoriesGlobal as $category)
            <li><a href="#">{{$category->name}}</a></li>
        @endforeach
    </ul>
</div>
