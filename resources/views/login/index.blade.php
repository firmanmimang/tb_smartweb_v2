@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if (session()->has('LoginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('LoginError')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <form action="/login" method="POST" novalidate>
              @csrf
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{old('email')}}">
                <label for="email">{!!($errors->has('email'))? '<div class="text-danger">'.$errors->first('email').'</div>' : 'Email address'!!}</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" value="{{old('password')}}">
                <label for="password">{!!($errors->has('password'))? '<div class="text-danger">'.$errors->first('password').'</div>' : 'Password'!!}</label>
              </div>

              <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            </form>
            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now</a></small>
        </main>
    </div>
</div>
@endsection