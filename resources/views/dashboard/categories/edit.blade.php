@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="{{route('dashboard.categories.update', $category)}}" class="mb-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name..." value="{{old('name', $category->name)}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5">{{old('description', $category->description)}}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

