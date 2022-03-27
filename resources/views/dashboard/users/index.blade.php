@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Users</h1>
    </div>
    <div class="table-responsive col-lg-10">
        <a href="{{route('dashboard.users.create')}}" class="btn btn-primary btn-sm m-1">Create new user</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Photo</th>
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Permission</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td style="height: 100px; width: 100px">
                    @if($user->image)
                        <img src="{{asset('storage/'.$user->image)}}" alt="{{$user->name}} photo" class="img-thumbnail img-fluid w-100" style="height: 100px; object-fit: cover">
                    @else
                        <img src="{{asset('img/no-profile.png')}}" alt="no photo" class="img-thumbnail img-fluid w-100" style="height: 100px; object-fit: cover">
                    @endif
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->getRoleNames()[0]}}</td>
                <td>Permission</td>
                <td>
                    <a href="{{route('dashboard.users.edit', ['user' => $user->username])}}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="{{route('dashboard.users.destroy', ['user' => $user->username])}}" method="POST" class="d-inline" onclick="return confirm('are you sure?')">
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