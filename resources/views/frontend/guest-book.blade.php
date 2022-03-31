@extends('frontend.layouts.main')
@section('content')
    <!-- form buku tamu -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <h1 class="col-12 text-dark">
                <center>Guest Book</center>
            </h1>
            <br>
            <form action="{{ route('guest.book') }}" method="POST" class="col-md-6 text-dark">
                @csrf
                <div class="">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        placeholder="name" required value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger" style="font-size: .875em">
                            {{ $message }}
                        </div>
                    @enderror
                </div><br>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <div class="form-check">
                        <input type="radio" class="d-none" name="gender" value="" checked>
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male"
                            @if (old('gender') == 'male') checked @endif>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female">
                        <label class="form-check-label" for="flexRadioDefault2"
                            @if (old('gender') == 'female') checked @endif>
                            Female
                        </label>
                    </div>
                    @error('gender')
                        <div class="text-danger" style="font-size: .875em">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" class="form-control @error('age') is-invalid @enderror" id="Age" name="age"
                        placeholder="25" value="{{ old('age') }}" required>
                    @error('age')
                        <div class="text-danger" style="font-size: .875em">
                            {{ $message }}
                        </div>
                    @enderror
                </div><br>
                <div class="">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phoneNumber"
                        name="phone_number" placeholder="08123456789" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <div class="text-danger" style="font-size: .875em">
                            {{ $message }}
                        </div>
                    @enderror
                </div><br>
                <div class="">
                    <label for="emailInfo" class="form-label">E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInfo"
                        name="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger" style="font-size: .875em">
                            {{ $message }}
                        </div>
                    @enderror
                </div><br>
                <div class="">
                    <label for="comments" class="form-label">Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="comments" rows="3" name="message"
                        placeholder="your message" required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="text-danger" style="font-size: .875em">
                            {{ $message }}
                        </div>
                    @enderror
                </div><br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        {{-- <div class="row justify-content-center">
            @forelse ($guest_comments as $comment)
                <div class="row text-dark" style="border-top: 1px solid black; border-bottom: 1px solid black">
                    <div class="col-12">
                        {{$comment->name}}
                        {{$comment->email}}
                    </div>
                    <div class="col-12">
                        {{$comment->message}}
                    </div>
                </div>
            @empty
                <div>
                    No Message From Guest
                </div>
            @endforelse
        </div> --}}

        <div class="my-5">
            @foreach ($guest_comments as $comment)
                <div class="container py-3" style="border-bottom: 1px solid black; border-top: 1px solid black;">
                    <div class="row mb-2">
                        {{-- <div class="col-1 d-flex justify-content-center align-items-center">
                            @if ($comment->user->image)
                                <div class="overflow-hidden" style="width: 50px; height: 50px; border-radius: 50%">
                                    <img src="{{ asset('storage/' . $comment->user->image) }}"
                                        alt="{{ $comment->user->name }} photo" class="w-100"
                                        style="object-fit: cover">
                                </div>
                            @else
                                <div class="overflow-hidden" style="width: 50px; height: 50px; border-radius: 50%">
                                    <img src="{{ asset('img/no-profile.png') }}" alt="no-photo" width="50"
                                        class="img-fluid" style="">
                                </div>
                            @endif
                        </div> --}}
                        <div class="col-11 d-flex flex-column justify-content-center align-items-start text-dark">
                            <div>
                                {{ $comment->name }}
                            </div>
                            <div>
                                {{ $comment->email }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        {{ $comment->message }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
