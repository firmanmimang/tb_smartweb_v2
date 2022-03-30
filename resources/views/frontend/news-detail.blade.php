@extends('frontend.layouts.main')
@section('content')
    <!-- slider news 3 artikel headline-->
    <div class="wrapper">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            {{-- <ol class="carousel-indicators">
                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            </ol> --}}
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <div class="overlay-image"
                        @if ($news->image) style="background-image:url({{ asset('storage/' . $news->image) }});">
                        @else
                            style="background-image:url({{ asset('img/no_image_available.png') }});"> @endif
                        </div>
                    </div>
                </div>
                {{-- <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
                    <span class="sr-only"></span>
                    <span class="carousel-control-prev-icon" aria-bs-hidden="true"></span>
                </a>
                <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
                    <span class="sr-only"></span>
                    <span class="carousel-control-next-icon" aria-bs-hidden="true"></span>
                </a> --}}
            </div>
        </div>
        <article class="container pb-3">
            <h1 class="my-3">{{ $news->title }}</h1>
            <p>by <a class="text-decoration-none"
                    href="/blog?author={{ $news->author->username }}">{{ $news->author->name }}</a> in <a
                    class="text-decoration-none"
                    href="/blog?category={{ $news->category->slug }}">{{ $news->category->name }}</a>.</p>
            <div class="my-4">
                {!! $news->body !!}
            </div>
        </article>

        <div class="container mt-4 mb-5" style="border-bottom: 1px solid black; border-top: 1px solid black;">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('news.store.comment', $news) }}" method="post" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" name="comment" id="comment" rows="3" required placeholder="your comment"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        <div class="mb-5">
            @foreach ($comments as $comment)
                <div class="container py-3" style="border-bottom: 1px solid black; border-top: 1px solid black;">
                    <div class="row mb-2">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            @if ($comment->user->image)
                                <div class="overflow-hidden" style="width: 50px; height: 50px; border-radius: 50%">
                                    <img src="{{ asset('storage/' . $comment->user->image) }}"
                                        alt="{{ $comment->user->name }} photo" class="w-100"
                                        style="object-fit: cover">
                                </div>
                            @else
                                <div class="overflow-hidden" style="width: 50px; height: 50px; border-radius: 50%">
                                    <img src="{{ asset('img/no-profile.png') }}" alt="no-photo" width="50"
                                        class="img-fluid" style="">
                                </div>
                            @endif
                        </div>
                        <div class="col-11 d-flex flex-column justify-content-center align-items-start text-dark">
                            <div>
                                {{ $comment->user->name }}
                            </div>
                            <div>
                                {{ $comment->date }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        {{ $comment->body }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
