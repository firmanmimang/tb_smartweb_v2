@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Profile</h1>
    </div>
    <div class="row mb-5">
        <div class="col-md-5">
            @if ($user->image)
                <div class="w-100 overflow-hidden rounded" style="max-height: 500px">
                    <img src="{{ asset('storage/' . $user->image) }}" alt="profile photo {{ $user->name }}"
                        class="img-fluid img-preview" style="object-fit: cover">
                </div>
            @else
                <div class="w-100 overflow-hidden rounded" style="max-height: 500px">
                    <img src="{{ asset('img/no-profile.png') }}" alt="no photo" class="img-fluid img-preview"
                        style="object-fit: cover; object-position: center">
                </div>
            @endif
        </div>
        <div class="col-md-7">
            <form method="POST" action="{{ route('dashboard.profile.update', $user) }}" class="mb-3"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="name..." value="{{ $user->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" placeholder="username..." value="{{ $user->username }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        placeholder="email..." value="{{ $user->email }}" disabled>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @can('edit-profile')
                    <div class="mb-3">
                        <label for="image" class="form-label">Change Profile Photo</label>
                        <img src="" class="img-fluid mb-3 col-sm-5 img-preview">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                            onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endcan

                <div class="d-grid">
                    @can('change-password')
                        <a href="{{ route('dashboard.profile.password.index', $user) }}"
                            class="btn btn-warning btn-block my-3">Change Password</a>
                    @endcan

                    @can('edit-profile')
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    @endcan
                </div>
            </form>
        </div>
    </div>

    <script>
        // preview image
        function previewImage() {
            console.log('prv')
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
