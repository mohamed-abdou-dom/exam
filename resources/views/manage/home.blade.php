@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="{{ route('users.index') }}" class="card-title">
                        Manage Users
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="{{ route('roles.index') }}" class="card-title">
                        Manage Roles
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="{{ route('permissions.index') }}" class="card-title">
                        Manage Permissions
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="{{ route('exams.index') }}" class="card-title">
                        Manage Exams
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="{{ route('questions.index') }}" class="card-title">
                        Manage Questions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection