@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Roles
            <a href="{{ route('roles.index') }}" class="btn btn-light float-right">roles</a>
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

    <form action="{{ route('roles.update',$role->id) }}" method="POST">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="form-group">
                    <label for="name">Name (Slug)</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}">
                </div>
                <div class="form-group">
                <label for="display_name">Display Name</label>
                <input type="text" name="display_name" class="form-control" id="display_name" value="{{$role->display_name}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" id="description" value="{{$role->description}}">
                </div>
                <input type="hidden" name="permission_selected" v-model="permission_selected">
                <button type="submit" class="btn btn-outline-success">Update Role</button>
            </div>
            <div class="col-md-6">
                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" v-model="permission_selected" :value="{{$permission->id}}" id="{{$permission->id}}">
                        <label class="form-check-label" for="{{$permission->id}}">
                            {{$permission->display_name}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script type="module">
    new Vue({
        el:'#app',
        data:{
            permission_selected: {!!$role->permissions->pluck('id')!!},
        },
    });
</script>
@endsection