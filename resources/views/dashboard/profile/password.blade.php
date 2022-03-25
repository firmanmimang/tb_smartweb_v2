@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Change Password</h1>
    </div>
    <div class="row mb-5">
        <div class="col-md-5">
            <form action="{{route('dashboard.profile.password.update', $user)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Old Password</label>
                    <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword" name="oldPassword" placeholder="your old password . . ." value="{{old('oldPassword')}}">
                    @error('oldPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" placeholder="your new password . . ." value="{{old('newPassword')}}">
                    @error('newPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="newPassword_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="newPassword_confirmation" name="newPassword_confirmation" placeholder="your new password . . .">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>

            </form>
        </div>
    </div>
   
@endsection
