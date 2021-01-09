@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($exams as $exam)
            <div class="col-md-4">
                <div class="card exams">
                    <div class="card-body">
                    <h5 class="card-title">{{$exam->exam_name}}</h5>
                    <hr>
                    <p class="card-text">Total Questions : {{$exam->questions_count}}</p>
                    <p class="card-text">Total Result : {{$exam->total_result}}</p>
                    <p class="card-text">Passing : {{$exam->total_result/2}}</p>
                    <hr>
                    <a href="/exam/{{$exam->id}}" class="btn btn-light">Start Exam</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection