@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Permissions
            <a href="{{ route('permissions.index') }}" class="btn btn-light float-right">Permissions</a>
        </h2>
    </div>
    <hr>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="form-group">
            <label for="name">Name (Slug)</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$permission->name}}">
        </div>
        <div class="form-group">
            <label for="display_name">Display Name</label>
            <input type="text" name="display_name" class="form-control" id="display_name" value="{{$permission->display_name}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" id="description" value="{{$permission->description}}">
        </div>
        <button type="submit" class="btn btn-outline-success">Update permission</button>
    </form>
</div>
@endsection