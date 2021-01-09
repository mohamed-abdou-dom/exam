@extends('layouts.app')

@section('content')
<div class="container questions">
    <form action="/exam/result" method="POST">
        {{ csrf_field() }}
        @foreach ($questions as $question)
        <?php
            $shuffle = array($question->question_answer1,$question->question_answer2,$question->question_answer3);
            shuffle($shuffle);
        ?>
        <input type="hidden" name="exam_id" value="{{$exam_id}}">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$question->question_name}}</h5>
                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer{{$question->question_no}}" value="{{$shuffle[0]}}">
                    <p>{{$shuffle[0]}}</p>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer{{$question->question_no}}" value="{{$shuffle[1]}}">
                    <p>{{$shuffle[1]}}</p>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer{{$question->question_no}}" value="{{$shuffle[2]}}">
                    <p>{{$shuffle[2]}}</p>
                </div>
            </div>
        </div>
        @endforeach
        <button type="submit" class="btn btn-light btn-lg mt-3">Finish Exam</button>
    </form>
</div>
@endsection