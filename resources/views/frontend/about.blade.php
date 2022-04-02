@extends('frontend.layouts.main')
@section('content')
    <div class="container my-5">
        {{-- <div class="row">
            <div class="col-md-6">
                <div class="card w-100">
                    <div class="card-body d-flex" style="height: 200px">
                        <div class="overflow-hidden" style="height: 100%; width: 100%">
                            <img src="{{asset('img/team/firman.jpeg')}}" alt="firman hidayat photo" class="" style="object-fit: cover; height: 100%;">
                        </div>
                        <div class="text-dark p-3 d-flex justify-content-center align-items-center">
                            <h5 class="card-title">Firman Hidayat</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <h1 class="mb-5">About Us</h1>

        <div class="mb-5">
            <h2 class="mb-4">Address</h2>
            <ul class="m-0 ps-4 p-0">
                <li>Jl.Raya, RT.4/RW.1,</li>
                <li>Meruya Sel, Kec.Kembangan</li>
                <li>Jakarta,DKI Jakarta</li>
                <li>11650</li>
            </ul>
        </div>

        <div class="mb-5 row">
            <div class="col-md-2">
                <h2 class="mb-4 text-dark">Our Team</h2>
            </div>
            <div class="col-md-10">
                <div class="d-flex justify-content-around text-dark gap-2">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{asset('img/team/rolland.jpg')}}"  width="110" class="img-fluid" alt="photo rolland" style="border-radius: 50%">
                        <h3 class="mt-3 text-center"  style="font-size: 19px">M. Rolland Akbar</h3>
                        <h3 class="mt-2 mb-1 text-center" style="color: #14A2DF; font-size: 19px;">Project Manager</h3>
                        <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente optio aperiam dolor rec.</p>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{asset('img/team/firman.jpeg')}}"  width="110" class="img-fluid" alt="photo firman" style="border-radius: 50%">
                        <h3 class="mt-3 text-center"  style="font-size: 19px">Firman Hidayat</h3>
                        <h3 class="mt-2 mb-1 text-center" style="color: #14A2DF; font-size: 19px;">Programmer</h3>
                        <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente optio aperiam dolor rec.</p>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{asset('img/team/pandya.jpg')}}"  width="110" class="img-fluid" alt="photo pandya" style="border-radius: 50%">
                        <h3 class="mt-3 text-center"  style="font-size: 19px">Pandya Y. Dewananto</h3>
                        <h3 class="mt-2 mb-1 text-center" style="color: #14A2DF; font-size: 19px;">UI / UX</h3>
                        <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente optio aperiam dolor rec.</p>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{asset('img/team/luthfi.jpg')}}"  width="110" class="img-fluid" alt="photo luthfi" style="border-radius: 50%">
                        <h3 class="mt-3 text-center" style="font-size: 19px">Luthfi Januar Aulia</h3>
                        <h3 class="mt-2 mb-1 text-center" style="color: #14A2DF; font-size: 19px;">System Analyst</h3>
                        <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente optio aperiam dolor rec.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
