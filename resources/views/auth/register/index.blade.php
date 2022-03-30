{{-- @extends('auth.layouts.main') --}}

{{-- @section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="POST">
              @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{old('name')}}">
                <label for="name">Name</label>
                @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{old('username')}}">
                <label for="username">Username</label>
                @error('username')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{old('email')}}">
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              </div>

              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
        </main>
    </div>
</div>
@endsection --}}

@extends('auth.layouts.main')

@section('container')
    <div class="row justify-content-center align-items-center" style="
                  height: 100vh;
                  background-image: url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?crop=entropy&cs=srgb&fm=jpg&ixid=Mnw3MjAxN3wwfDF8c2VhcmNofDJ8fG5ld3N8ZW58MHx8fHwxNjQ4NTQ0ODY3&ixlib=rb-1.2.1&q=85&q=85&fmt=jpg&crop=entropy&cs=tinysrgb&w=450');
                  background-color: black;
                  background-repeat: no-repeat;
                  background-size: cover
                  ">
        <div class="col-md-8 pe-1">
            <h1 class="h3 fw-normal text-center mb-5">Register</h1>
            <main class="form-signin d-flex flex-column justify-content-center align-items-center position-relative"
                style="background-color: white; width: 100%; min-height: 500px; border-radius: 5px">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('LoginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('LoginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('home') }}" class="btn text-white"
                    style="position: absolute; top:10px; left:10px; background-color: black;">&lt; Back to Home</a>
                <img src="{{ asset('img/Logo_T_hitam.png') }}" height="50" alt="logo trusted news">
                <h3 class="mt-4">Create Account</h3>
                <small class="d-block text-center mb-4">Already have an account ? <a href="/login">Login</a></small>
                <form action="/register" method="POST" style="width: 50%">
                    @csrf
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <label for="name" style="width: 30%">Name</label>
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="name" autofocus required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <label for="email" style="width: 30%">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <label for="username" style="width: 30%">Username</label>
                        <input type="username" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="username" autofocus required value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <label for="password" style="width: 30%">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="password" required value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
            </main>

        </div>

    </div>
@endsection
