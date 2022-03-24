@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>
    <div class="table-responsive col-lg-10">
        <a href="{{route('dashboard.posts.create')}}" class="btn btn-primary btn-sm m-1">Create new post</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Publish</th>
              <th scope="col">Comment</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($posts as $post)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->publish_status ? 'publish':'not Publish'}}</td>
                <td>{{$post->comment_status ? 'on':'off'}}</td>
                <td>
                    <a href="{{route('dashboard.posts.show', $post)}}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="{{route('dashboard.posts.edit', $post)}}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="{{route('dashboard.posts.destroy', $post)}}" method="POST" class="d-inline" onclick="return confirm('are you sure?')">
                      @csrf
                      @method('delete')
                      <button class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
    </div>
    
@endsection