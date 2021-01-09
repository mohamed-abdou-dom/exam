@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Users
            <a href="{{ route('users.index') }}" class="btn btn-light float-right">Back</a>
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
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="name" class="form-control" id="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="auto_pass" class="form-check-input" id="autoPass" v-model="auto_pass">
                    <label class="form-check-label" for="autoPass">Generate Password</label>
                </div>
                <div class="form-group" v-if="!auto_pass">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <input type="hidden" name="roles" v-model="role_selected">
                <input type="hidden" name="permissions" v-model="permission_selected">
                <button type="submit" class="btn btn-outline-success">Add User</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <h3>Permissions</h3>
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="permission_selected" :value="{{$permission->id}}" id="{{$permission->name}}">
                            <label class="form-check-label" for="{{$permission->name}}">
                                {{$permission->display_name}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h3>Roles</h3>
                    @foreach ($roles as $role)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="role_selected" :value="{{$role->id}}" id="{{$role->name}}">
                            <label class="form-check-label" for="{{$role->name}}">
                                {{$role->display_name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="module">
    new Vue({
        el:'#app',
        data:{
            auto_pass: true,
            permission_selected: [],
            role_selected: [],
        },
    });
</script>
@endsection