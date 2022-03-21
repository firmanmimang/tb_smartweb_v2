@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="my-3">
            <div class="col-lg-8">
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left" style="margin-bottom: 1px;"></span> Back to all my posts</a>
                <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-warning"><span data-feather="edit" style="margin-bottom: 1px;"></span> Edit</a>
                <form action="/dashboard/posts/{{$post->slug}}" method="POST" class="d-inline" onclick="return confirm('are you sure?')">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger"><span data-feather="x-circle" style="margin-bottom: 1px;"></span> Delete</button>
                </form>
                <h1 class="mb-3">{{$post->title}}</h1>
                <p>by {{$post->author->name}} in {{$post->category->name}}.</p>
                 @if ($post->image)
                    <div style="max-height:350px; overflow:hidden; background-size:cover;">
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{$post->category->name}}" class="img-fluid">
                    </div>
                 @else
                    <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="{{$post->category->name}}" class="img-fluid">
                 @endif
                
                <article class="my-3 fs-5">
                    {!!$post->body!!}
                </article>

            </div>
        </div>
    </div>
@endsection