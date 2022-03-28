@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>
    <div class="table-responsive col-lg-8">
        @can('categories-create')
            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary btn-sm m-1">Create new category</a>
        @endcan
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->description ?? '-' }}</td>
                        <td>
                            @can('categories-edit')
                                <a href="{{ route('dashboard.categories.edit', ['category' => $category->slug]) }}"
                                    class="badge bg-warning"><span data-feather="edit"></span></a>
                            @endcan
                            @can('categories-delete')
                                <form action="{{ route('dashboard.categories.destroy', ['category' => $category->slug]) }}"
                                    method="POST" class="d-inline" onclick="return confirm('are you sure?')">
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
    </div>
@endsection
