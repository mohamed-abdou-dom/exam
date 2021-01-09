@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Roles
            <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-light float-right">Edit Role</a>
        </h2>
    </div>
    <hr>
    <h3>Role Details</h3>
    <p>Name (Slug): {{$role->name}}</p>
    <p>Display Name: {{$role->display_name}}</p>
    <p>Description: {{$role->description}}</p>
    <hr>
    <h3 class="mb-5">Role Permissions</h3>

        <div class="row">
            @foreach ($role->permissions as $permission)
            <div class="col-md-3">
                <p>Name (Slug): {{$permission->name}}</p>
                <p>Display Name: {{$permission->display_name}}</p>
                <p>Description: {{$permission->description}}</p>
                <hr>
            </div>
            @endforeach
        </div>    
</div>
@endsection
