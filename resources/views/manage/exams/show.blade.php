@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Exams
            <a href="{{ route('exams.edit',$exam->id) }}" class="btn btn-light float-right">Edit Exam</a>
        </h2>
    </div>
    <hr>
    <h3>Exam Details</h3>
    <p>Exam Name: {{$exam->exam_name}}</p>
    <p>Exam Result: {{$exam->total_result}}</p>
    <hr>
</div>
@endsection
