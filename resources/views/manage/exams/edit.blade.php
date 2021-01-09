@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Exams
            <a href="{{ route('exams.index') }}" class="btn btn-light float-right">Exams</a>
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
    <form action="{{ route('exams.update',$exam->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$exam->exam_name}}">
        </div>
        <div class="form-group">
            <label for="total_result">Total Result</label>
            <input type="number" name="total_result" class="form-control" id="total_result" value="{{$exam->total_result}}">
        </div>
        <button type="submit" class="btn btn-outline-success">Update exam</button>
    </form>
</div>
@endsection
