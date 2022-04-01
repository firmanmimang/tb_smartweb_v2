@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{auth()->user()->name}}</h1>
    </div>
    Role : {{auth()->user()->getRoleNames()[0]}} <br>
    Access Permission : <br>
    <ul>
        @foreach (auth()->user()->getAllPermissions() as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ul>
    <br>
@endsection