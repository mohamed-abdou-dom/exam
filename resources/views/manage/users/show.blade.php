@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Users
            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-light float-right">Edit User</a>
        </h2>
    </div>
    <hr>
    <h3>User Details</h3>
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <hr>
    <h3>Roles</h3>
    @foreach ($user->roles as $role)
        <p>{{$role->name}}</p>
    @endforeach
    <hr>
    <h3>Permissions</h3>
    @foreach ($user->permissions as $permission)
        <p>{{$permission->name}}</p>
    @endforeach
</div>
@endsection
