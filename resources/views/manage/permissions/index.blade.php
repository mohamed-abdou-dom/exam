@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Permissions
            <a href="{{ route('permissions.create') }}" class="btn btn-light float-right">Add New Permission</a>
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
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->display_name}}</td>
                    <td>{{$permission->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-outline-primary">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$permissions->links()}}
</div>
@endsection