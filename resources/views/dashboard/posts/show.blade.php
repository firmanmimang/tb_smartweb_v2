@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="my-3">
            <div class="col-lg-8">
                <a href="{{route('dashboard.posts.index')}}" class="btn btn-success"><span data-feather="arrow-left" style="margin-bottom: 1px;"></span> Back to all my posts</a>
                <a href="{{route('dashboard.posts.edit', $post)}}" class="btn btn-warning"><span data-feather="edit" style="margin-bottom: 1px;"></span> Edit</a>
                <form action="{{route('dashboard.posts.destroy', $post)}}" method="POST" class="d-inline" onclick="return confirm('are you sure?')">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger"><span data-feather="x-circle" style="margin-bottom: 1px;"></span> Delete</button>
                </form>
                <div class="my-3 d-flex">
                    <div class="me-5">
                        publish_status : {{$post->publish_status ? 'publish':'not publish'}}
                    </div>
                    <div>
                        comment_status : {{$post->comment_status ? 'on':'off'}}
                    </div>
                </div>
                <h1 class="mb-3">{{$post->title}}</h1>
                @if ($post->is_crawl)
                    <p>by {{$post->author_crawl}} in {{$post->category->name ?? null}}.</p>
                    @if ($post->image)
                        <div style="max-height:350px; overflow:hidden; background-size:cover;">
                            <img src="{{ $post->image }}" alt="{{$post->category->name ?? null}}" class="img-fluid">
                        </div>
                    @else
                        <img src="{{asset('img/no_image_available.png')}}" alt="{{$post->category->name ?? null}}" class="img-fluid">
                    @endif
                @else
                    <p>by {{$post->author->name ?? null}} in {{$post->category->name ?? null}}.</p>
                    @if ($post->image)
                        <div style="max-height:350px; overflow:hidden; background-size:cover;">
                            <img src="{{ asset('storage/'. $post->image) }}" alt="{{$post->category->name ?? null}}" class="img-fluid">
                        </div>
                    @else
                        <img src="{{asset('img/no_image_available.png')}}" alt="{{$post->category->name ?? null}}" class="img-fluid">
                    @endif
                @endif
                
                <article class="my-3 fs-5">
                    {!!$post->body!!}
                </article>

            </div>
        </div>
    </div>
@endsection