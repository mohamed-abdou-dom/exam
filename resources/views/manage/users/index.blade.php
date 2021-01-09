@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Users
            <a href="{{ route('users.create') }}" class="btn btn-light float-right">Add New User</a>
        </h2>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Created_at</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-primary">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$users->links()}}
</div>
@endsection