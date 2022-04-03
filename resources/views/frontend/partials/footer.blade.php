<footer class="footer position-relative mt-auto">
    {{-- for scrollTop javascript location footer --}}
    <div style="opacity: 0; position: absolute; top: 0; left: 0;" id="positionFooter"></div>
    {{-- ----------------------------------------- --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="icon mb-3">
                    <img src="{{ asset('img/Logo_T_putih.png') }}" height="100" alt="logo trusted news">
                    <div class="category flex-nowrap">
                        @isset($categoriesFooter[0])
                            <ul class="ms-3 p-0">
                                @foreach ($categoriesFooter[0] as $category)
                                    <li><a href="{{route('search', ['category' => $category['slug']])}}" style="word-wrap: break-word; display: inline-block;">{{$category['name']}}</a></li>
                                @endforeach
                            </ul>
                            <ul class="ms-3 p-0">
                                @foreach ($categoriesFooter[1] as $category)
                                    <li><a href="{{route('search', ['category' => $category['slug']])}}" style="word-wrap: break-word; display: inline-block;">{{$category['name']}}</a></li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 d-sm-flex flex-column align-items-center mb-3">
                <div class="about">
                    <h5>
                        <ul class="m-0 p-0">
                            <li class="mb-3"><a href="{{ route('home') }}">HOME</a></li>
                            <li class="mb-3"><a href="{{ route('about') }}">ABOUT US</a></li>
                            <li class="mb-3"><a href="{{route('guest.book')}}">GUEST BOOK</a></li>
                        </ul>
                    </h5>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-3">
                <div class="guest">
                    <h5>ADDRESS</h5>
                    <ul class="m-0 p-0">
                        <li>Jl.Raya, RT.4/RW.1,</li>
                        <li>Meruya Sel, Kec.Kembangan</li>
                        <li>Jakarta,DKI Jakarta</li>
                        <li>11650</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-3">
                <div class="talk mb-3">
                    <h5>LET'S TALK</h5>
                    <ul class="m-0 p-0">
                        <li><a href="#">Office: +62 81212121212</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex justify-content-around" style="width: 60%">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright mt-5">
            <p class="text-center">2022 - TrustedNews.com | All rights Received</p>
        </div>
    </div>
</footer>
