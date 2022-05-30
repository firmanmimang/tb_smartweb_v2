<nav class="navbar navbar-expand-xl navbar-light">
    <div class="container-fluid">
        <div class="left">
            <a class="navbar-brand d-flex justify-content-center align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('img/Logo_T.png') }}" width="200" height="50" alt="logo trusted news">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-auto justify-content-end" id="navbarTogglerDemo02">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto gap-3">
                <form action="{{ route('search') }}" class="d-flex search_bar" method="GET">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <input class="form-control width-100-lg-custom-home margin-top-3-lg-custom-home" type="text" placeholder="Search" name="search" value="{{ request('search') }}">
                </form>
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link @if (Request::is('/')) active-front @endif">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}"
                        class="nav-link @if (Request::is('about')) active-front @endif">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('guest.book') }}"
                        class="nav-link @if (Request::is('guest-book')) active-front @endif">Guest Book</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            {{-- <i class="bi bi-box-arrow-in-right"></i> --}}
                            Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 99999">
                            <li><a class="dropdown-item" href="/dashboard"><i
                                        class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
