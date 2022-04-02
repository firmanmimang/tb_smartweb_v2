@extends('frontend.layouts.main')
@section('content')
    <!-- slider post 3 artikel headline-->
    <div class="wrapper">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($newsHighlight as $index => $item)
                    <li data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}" class="active"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @forelse ($newsHighlight as $index => $highlight)
                    <div class="carousel-item {{ $index == 0 ? 'active' : null }}" data-bs-interval="4000">
                        <a href="{{ route('news.detail', $highlight) }}">
                            <div class="overlay-image"
                                @if ($highlight->image) style="background-image:url({{ asset('storage/' . $highlight->image) }});">
                                @else
                                    style="background-image:url({{ asset('img/no_image_available.png') }});"> @endif
                                </div>
                                <div class="container" style="color:beige">
                                    <div style="background-color: black; opacity: .7;">
                                        <h3 class="p-2 pb-0">{{ $highlight->title }}</h3>
                                        <p class="px-2 py-0"> <span class="text-decoration-none"
                                                style="color:beige;"></span> <a class="text-decoration-none"
                                                href="/blog?author={{ $highlight->author->username }}">{{ $highlight->author->name }}</a>
                                            in <a class="text-decoration-none"
                                                href="/blog?category={{ $highlight->category->slug }}">{{ $highlight->category->name }}</a>.
                                        </p>
                                        <p class="p-2 pt-0">{{ $highlight->excerpt }}</p>
                                    </div>
                                </div>
                        </a>
                    </div>
                @empty
                    <div class="carousel-item active" data-bs-interval="4000">
                        <div class="overlay-image"
                            style="background-image:url({{ asset('img/no_image_available.png') }});">
                        </div>
                        <div class="container">
                            <h3>No highlight</h3>
                            {{-- <p></p> --}}
                        </div>
                    </div>
                @endforelse
            </div>
            <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
                <span class="sr-only"></span>
                <span class="carousel-control-prev-icon" aria-bs-hidden="true"></span>
            </a>
            <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
                <span class="sr-only"></span>
                <span class="carousel-control-next-icon" aria-bs-hidden="true"></span>
            </a>
        </div>
    </div>

    <div class="container-fluid my-5">
        <h1 class="mx-5 my-3">Latest News</h1>
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
                                <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->category->name }}" class="w-100" style="object-fit: cover; height: 100%;">
                            </div>
                        @else
                            <div class="w-100 overflow-hidden" style="height: 150px;">
                                <img src="{{ asset('img/no_image_available.png') }}" class="w-100" alt="no image" style="object-fit: cover; height: 100%;">
                            </div>
                        @endif
                        <div class="card-body text-dark">
                            <h5 class="card-title">{{ $p->title }}</h5>
                            <p>
                                <small class="text-muted">by <a class="text-decoration-none" href="{{route('search', ['author' => $p->author->username ])}}">{{ $p->author->name }}</a>
                                    {{ $p->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ $p->excerpt }}</p>
                            <a href="{{ route('news.detail', $p) }}" class="btn btn-primary">read more...</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-danger text-center">
                    <h2>No News</h2>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-end mb-5">
            {{$news->links()}}
        </div>

        {{-- team --}}
        <div class="row my-4">
            <div class="col-md-3 pe-0">
                <img src="{{asset('img/team/firman.jpeg')}}" alt="" class="w-100" alt="" style="height: 100%; object-fit: cover">
            </div>
            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center" style="background-color: #14A2DF;">
                <div class="p-3">
                    <h5 class="card-title">Firman Hidayat</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-3 p-0">
                <img src="{{asset('img/team/pandya.jpg')}}"
                alt="" class="w-100" alt="" style="height: 100%; object-fit: cover">>
            </div>
            <div class="col-md-3 ps-0 d-flex flex-column justify-content-center align-items-center">
                <div class="p-3" style="color: black">
                    <h5 class="card-title">Pandya Yassar Dewananto</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
            {{-- row 2 team --}}
            <div class="col-md-3 pe-0 d-flex flex-column justify-content-center align-items-center">
                <div class="p-3" style="color: black">
                    <h5 class="card-title">Mochammad Rolland Akbar</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-3 p-0">
                <img src="{{asset('img/team/rolland.jpg')}}"
                width="250" height="200" alt="" class="w-100 w-100" alt="" style="height: 100%; object-fit: cover">>
            </div>
            <div class="col-md-3 p-0 d-flex flex-column justify-content-center align-items-center">
                <div class="p-3" style="color: black">
                    <h5 class="card-title">Luthfi Januar Aulia</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-3 ps-0">
                <img src="{{asset('img/team/luthfi.jpg')}}"
                width="250" height="200" alt="" class="w-100" alt="" style="height: 100%; object-fit: cover">>
            </div>
        </div>
        <h6 class="display-4 text-end" style="color: #14A2DF;">Meet Our Team</h6>
    </div>

    {{-- <!--content card - EDITORIAL'S PICK -->
    <div>
        <div class="container text-center py-5">
            <h6 class="display-4">EDITORIAL'S PICK</h6>
            <p class="lead">Our curated selections of pieces on a particular subject. It one way the PRX
                editorial staff makes it easier for stations to find the good stuff. Here as playlists and are divided
                by length to make it easy for stations to find what they need.</p>
        </div>
        <div class="card-group">
            <div class="card">
                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                    width="250" height="200" alt="" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                    width="250" height="200" alt="" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                    width="250" height="200" alt="" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional
                        content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                    width="250" height="200" alt="" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This card has even longer content than the first to show that equal height
                        action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    <!-- content card kedua -->
    <div class="card-group">
        <div class="card">
            <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                width="250" height="200" alt="" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                width="250" height="200" alt="" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <!-- Individual .carousel-item interval -->
            <div class="card-body">
                <h4>Adversiting</h4>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="https://www.die-tagespost.de/storage/image/3/3/9/1/71933_artdetail-responsive-911w_1xQNG5_p5a5Lq.webp"
                                class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://img.beritasatu.com/cache/investor/798x449-2/1642559792.jpg);">
                        </div>
                        <div class="container" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="https://covid19.go.id/storage/app/uploads/public/623/d86/32d/623d8632ded1c153419597.png"
                                class="d-block w-100" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- content card ketiga -->
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Don't Miss It </h5>
            </div>
            <div>
                <div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">The Latest</h5>
            </div>
            <div>
                <div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- team -->
    {{-- <div class="card-group">
        <div class="card">
            <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                width="250" height="200" alt="" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
            <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                width="250" height="200" alt="" class="card-img-top" alt="">
        </div>
        <div class="card">
            <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                width="250" height="200" alt="" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional
                    content.</p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional
                    content.</p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
            <img src="https://obs.line-scdn.net/0hZU6sHdKPBXoLChEhj4R6LTNcCQs4bB9zKWpNHSsJU0NyJkF-YmpWGXkPC1Z2OEAoK24ZHn5ZC050aUIuMA/w644"
                width="250" height="200" alt="" class="card-img-top" alt="">
        </div>
    </div> --}}
@endsection
