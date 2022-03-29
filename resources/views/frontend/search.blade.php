@extends('frontend.layouts.main')
@section('content')
    <div class="container-fluid my-5">
        <h1 class="text-center my-4">{{$title}}</h1>
        <div class="row align-items-stretch">
            @forelse ($news as $p)
                <div class="col-md-4 mb-3">
                    <div class="card" style="height: 100%">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                            <a href="{{route('search', ['category' => $p->category->slug])}}" class="text-light text-decoration-none">
                                {{ $p->category->name }}
                            </a>
                        </div>
                        @if ($p->image)
                            <div class="w-100 overflow-hidden" style="height: 150px;">
                                <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->category->name }}"
                                    class="w-100" style="object-fit: cover; height: 100%;">
                            </div>
                        @else
                            <div class="w-100 overflow-hidden" style="height: 150px;">
                                <img src="{{ asset('img/no_image_available.png') }}" class="w-100"
                                    alt="{{ $p->category->name }}" style="object-fit: cover; height: 100%;">
                            </div>
                        @endif
                        <div class="card-body text-dark">
                            <h5 class="card-title">{{ $p->title }}</h5>
                            <p>
                                <small class="text-muted">by <a class="text-decoration-none"
                                        href="{{route('search', ['author' => $p->author->username])}}">{{ $p->author->name }}</a>
                                    {{ $p->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ $p->excerpt }}</p>
                            <a href="{{ route('news.detail', $p) }}" class="btn btn-primary">read more...</a>
                        </div>
                    </div>
                </div>
            @empty
                <h2 class="text-center text-danger">
                    No News Found
                </h2>
            @endforelse
        </div>

        {{$news->links()}}
    </div>
@endsection
