@extends('layouts.main')
@section('container')
    <h1 class="mb-3 text-center">{{$title}}</h1>

    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
        <form action="/blog">
          @if (request('category'))
              <input type="hidden" name="category" value="{{request('category')}}"> 
          @endif
          @if (request('author'))
              <input type="hidden" name="author" value="{{request('author')}}"> 
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="search..." name="search" value="{{request('search')}}">
            <button class="btn btn-dark" type="submit">Button</button>
          </div>
        </form>
      </div>
    </div>

    @if($posts->count())
    <div class="card mb-3">
        @if ($posts[0]->image)
            <div style="max-height:400px; overflow:hidden;">
                <img src="{{ asset('storage/'. $posts[0]->image) }}" alt="{{$posts[0]->category->name}}" class="img-fluid">
            </div>
        @else
            <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" alt="{{$posts[0]->category->name}}" class="img-fluid">
        @endif
        <div class="card-body text-center">
          <h3 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{$posts[0]->slug}}">{{$posts[0]->title}}</a></h3>
          <p>
            <small class="text-muted">by <a class="text-decoration-none" href="/blog?author={{$posts[0]->author->username}}">{{$posts[0]->author->name}}</a> in <a class="text-decoration-none" href="/blog?category={{$posts[0]->category->slug}}">{{$posts[0]->category->name}}</a> {{$posts[0]->created_at->diffForHumans()}}
            </small>
          </p>
          <p class="card-text">{{$posts[0]->excerpt}}</p>
          <a href="/posts/{{$posts[0]->slug}}" class="text-decoration-none btn btn-primary">read more...</a>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $p)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/blog?category={{$p->category->slug}}" class="text-light text-decoration-none">{{$p->category->name}}</a></div>
                    @if ($p->image)
                          <img src="{{ asset('storage/'. $p->image) }}" alt="{{$p->category->name}}" class="img-fluid">
                    @else
                        <img src="https://source.unsplash.com/500x400?{{$p->category->name}}" class="card-img-top" alt="{{$p->category->name}}">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{$p->title}}</h5>
                      <p>
                        <small class="text-muted">by <a class="text-decoration-none" href="/blog?author={{$p->author->username}}">{{$p->author->name}}</a> {{$posts[0]->created_at->diffForHumans()}}
                        </small>
                      </p>
                      <p class="card-text">{{$p->excerpt}}</p>
                      <a href="/posts/{{$p->slug}}" class="btn btn-primary">read more...</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
    <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-end">
      {{$posts->links()}}
    </div>
    
    
    {{-- @foreach ($posts->skip(1) as $p)
    <article class="mb-5 border-bottom pb-3">
        <a class="text-decoration-none" href="/posts/{{$p->slug}}"><h3>{{$p->title}}</h3></a>
        <p>by <a class="text-decoration-none" href="/author/{{$p->author->username}}">{{$p->author->name}}</a> in <a class="text-decoration-none" href="/categories/{{$p->category->slug}}">{{$p->category->name}}</a>.</p>
        <p>{{$p->excerpt}}</p>
        <a class="text-decoration-none" href="/posts/{{$p->slug}}">read more...</a>
    </article>
    @endforeach --}}
@endsection