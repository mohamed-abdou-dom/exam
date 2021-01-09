@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Permissions
            <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-light float-right">Edit Permission</a>
        </h2>
    </div>
    <hr>
    <h3>Permission Details</h3>
    <p>Name (Slug): {{$permission->name}}</p>
    <p>Display Name: {{$permission->display_name}}</p>
    <p>Description: {{$permission->description}}</p>
    <hr>
</div>
@endsection
