@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Users
            <a href="{{ route('users.index') }}" class="btn btn-light float-right">Users</a>
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
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <input type="hidden" name="roles" v-model="role_selected">
                <input type="hidden" name="permissions" v-model="permission_selected">
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="name" class="form-control" id="username" value="{{$user->name}}">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="hidden" name="password_options" :value="password_options">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="pass1" v-model="password_options" value="same_pass">
                    <label class="form-check-label" for="pass1">Don't Change Passwors</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="pass2" v-model="password_options" value="auto_pass">
                    <label class="form-check-label" for="pass2">Generate Auto Password</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="pass3" v-model="password_options" value="manaually">
                    <label class="form-check-label" for="pass3">Create New Password</label>
                </div>
                <br><br>
                <div class="form-group" v-if="password_options=='manaually'">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-outline-success">Update User</button>
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
            password_options: 'same_pass',
            permission_selected: {!!$user->permissions->pluck('id')!!},
            role_selected: {!!$user->roles->pluck('id')!!},
        },
    });
</script>
@endsection