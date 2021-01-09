@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Roles
            <a href="{{ route('roles.create') }}" class="btn btn-light float-right">Add New Role</a>
        </h2>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Slug</th>
            <th scope="col">Name</th>
            <th scope="col">Created_at</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->display_name}}</td>
                    <td>{{$role->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-primary">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$roles->links()}}
</div>
@endsection