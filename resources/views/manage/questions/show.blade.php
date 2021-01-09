@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Questions
            <a href="{{ route('questions.edit',$question->id) }}" class="btn btn-light float-right">Edit Question</a>
        </h2>
    </div>
    <hr>
    <h3 class="mb-4">Question Details</h3>
    <p>Question No: {{$question->question_no}}</p>
    <p>Question Name: {{$question->question_name}}</p>
    <p>Question Answer1: {{$question->question_answer1}}</p>
    <p>Question Answer2: {{$question->question_answer2}}</p>
    <p>Question Answer3: {{$question->question_answer3}}</p>
    <p>Correct Answer: {{$question->correct_answer}}</p>
    <p>Exam Name: {{$question->exam->exam_name}}</p>
    <hr>
</div>
@endsection
