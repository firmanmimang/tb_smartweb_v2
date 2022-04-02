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

        <div class="mb-5">
            <h2 class="mb-4">Our Team</h2>
            <div class="d-flex justify-content-around">
                <img src="{{asset('img/team/firman.jpeg')}}"  width="150" class="img-fluid" alt="photo firman" style="border-radius: 50%">
                <img src="{{asset('img/team/pandya.jpg')}}"  width="150" class="img-fluid" alt="photo pandya" style="border-radius: 50%">
                <img src="{{asset('img/team/rolland.jpg')}}"  width="150" class="img-fluid" alt="photo rolland" style="border-radius: 50%">
                <img src="{{asset('img/team/luthfi.jpg')}}"  width="150" class="img-fluid" alt="photo luthfi" style="border-radius: 50%">
            </div>
        </div>
    </div>
@endsection
