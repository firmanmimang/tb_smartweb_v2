<div class="top_nav d-flex mt-0">
    <div class="left">
        <a class="navbar-brand d-flex justify-content-center align-items-center" href="{{route('home')}}">
            <img src="{{asset('img/logo_T.png')}}" width="200" height="50" alt="logo trusted news">
        </a>
    </div>
    <div class="right">
        <ul class="d-flex">
            <div class="search_bar me-auto d-flex justify-content-center align-items-center">
                <form action="{{route('search')}}">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{request('category')}}"> 
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{request('author')}}"> 
                    @endif
                    {{-- <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="search..." name="search" value="{{request('search')}}">
                      <button class="btn btn-dark" type="submit">Button</button>
                    </div> --}}
                    <input type="text" placeholder="Search" name="search" value="{{request('search')}}">
                  </form>
            </div>
            <div class="d-flex justify-content-around align-items-center">
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link @if(Request::is('/')) active-front @endif">Home</a></li>
                <li class="nav-item"><a href="{{route('about')}}" class="nav-link @if(Request::is('about')) active-front @endif">About Us</a></li>
                <li class="nav-item"><a href="{{route('guest.book')}}" class="nav-link @if(Request::is('guest-book')) active-front @endif">Guest Book</a></li>
                <div class="d-flex">
                    @guest
                        <li class="">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        <li class="">
                            <a href="{{ route('login') }}" class="nav-link">
                                {{-- <i class="bi bi-box-arrow-in-right"></i> --}}
                                Login</a>
                        </li>
                    @endguest
                    @auth
                    <ul class="navbar-nav ms-auto mt-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
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
                    </ul>
                    @endauth
                </div>
            </div>
        </ul>
    </div>
</div>
