@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All News</h1>
    </div>
    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Publish</th>
                    <th scope="col">Comment</th>
                    @can('change-highlight-news')
                        <th scope="col">Higlight</th>
                    @endcan
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->publish_status ? 'publish' : 'not Publish' }}</td>
                        <td>{{ $post->comment_status ? 'on' : 'off' }}</td>
                        @can('change-highlight-news')
                            <td class="text-center">
                                {{ $post->is_highlight ? 'true' : 'false' }} <br>
                                <form action="{{ route('dashboard.posts.highlight', $post) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn {{$post->is_highlight? 'btn-danger': 'btn-success'}}">{{ $post->is_highlight ? 'SET FALSE' : 'SET TRUE' }}</button>
                                </form>
                            </td>
                        @endcan
                        <td>
                            @can('posts-show')
                                <a href="{{ route('dashboard.posts.show', $post) }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>
                            @endcan
                            @can('posts-edit')
                                <a href="{{ route('dashboard.posts.edit', $post) }}" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                            @endcan
                            @can('posts-delete')
                                <form action="{{ route('dashboard.posts.destroy', $post) }}" method="POST"
                                    class="d-inline" onclick="return confirm('are you sure?')">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$posts->links()}}
    </div>
@endsection
