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
        <article class="container">
            <h1 class="my-3">{{$news->title}}</h1>
            <p>by <a class="text-decoration-none" href="/blog?author={{$news->author->username}}">{{$news->author->name}}</a> in <a class="text-decoration-none" href="/blog?category={{$news->category->slug}}">{{$news->category->name}}</a>.</p>
            <div class="my-4">
                {!! $news->body !!}
            </div>
        </article>

        <div>
            
        </div>
    </div>
@endsection
