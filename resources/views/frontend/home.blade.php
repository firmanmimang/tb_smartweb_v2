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
                <a href="{{route('news.detail', $highlight)}}">
                    <div class="carousel-item {{$index == 0 ? 'active' : null}}" data-bs-interval="4000">
                        <div class="overlay-image"
                            @if($highlight->image)
                                style="background-image:url({{asset('storage/'.$highlight->image)}});">
                            @else
                                style="background-image:url({{asset('img/no_image_available.png')}});">
                            @endif
                        </div>
                        <div class="container">
                            <h3>{{$highlight->title}}</h3>
                            <p>{{$highlight->excerpt}}</p>
                        </div>
                    </div>
                </a>
                @empty
                <div class="carousel-item active" data-bs-interval="4000">
                    <div class="overlay-image" style="background-image:url({{asset('img/no_image_available.png')}});">
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
    </div>
    <!-- team -->
    <div class="card-group">
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
    </div>
    <div class="container py-5">
        <h6 class="display-4">Meet Our Team</h6>
    </div> --}}
@endsection
