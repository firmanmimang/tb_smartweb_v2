@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit New Post</h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="{{route('dashboard.posts.update', $post)}}" class="mb-3" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label class="form-label">Publish Status</label>
            <div class="d-flex">
                <div class="form-check me-5">
                    <input class="form-check-input @error('publish_status') is-invalid @enderror" type="radio" name="publish_status" id="flexRadioDefault1" value="true" @if($post->publish_status) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Publish
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('publish_status') is-invalid @enderror" type="radio" name="publish_status" id="flexRadioDefault2" value="false" @if(!$post->publish_status) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Not publish
                    </label>
                </div>
            </div>
            @error('publish_status')
                <div class="text-danger" style="font-size: .875em">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Comment</label>
            <div class="d-flex">
                <div class="form-check me-5">
                    <input class="form-check-input @error('comment_status') is-invalid @enderror" type="radio" name="comment_status" id="flexRadioDefault3" value="true" @if($post->comment_status) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault3">
                        On
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('comment_status') is-invalid @enderror" type="radio" name="comment_status" id="flexRadioDefault4" value="false" @if(!$post->comment_status) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault4">
                        Off
                    </label>
                </div>
            </div>
            @error('comment_status')
                <div class="text-danger" style="font-size: .875em">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="title..." value="{{old('title', $post->title)}}">
            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="slug..." value="{{old('slug', $post->slug)}}">
            @error('slug')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                <option selected disabled>Select Category</option>
                @foreach ($categories as $category)
                    @if (old('category_id', $post->category_id) == $category->id)
                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input type="hidden" name="oldImage" value="{{$post->image}}">
            @if ($post->image)
                <img src="{{asset('storage/'.$post->image)}}" class="img-fluid mb-3 col-sm-5 d-block img-preview">
            @else
                <img src="" class="img-fluid mb-3 col-sm-5 img-preview">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image_description" class="form-label">Image Description</label>
            <input type="text" class="form-control @error('image_description') is-invalid @enderror" id="image_description" name="image_description"
                placeholder="Image Description..." value="{{ old('image_description', $post->image_description) }}">
            @error('image_description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{old('body', $post->body)}}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title='+ title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    // preview image
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection