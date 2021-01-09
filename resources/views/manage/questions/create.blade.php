@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Questions
            <a href="{{ route('questions.index') }}" class="btn btn-light float-right">Back</a>
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
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no">Question Number</label>
                    <input type="text" name="question_no" class="form-control" id="no">
                </div>
                <div class="form-group">
                    <label for="question_name">Question Name</label>
                    <input type="text" name="question_name" class="form-control" id="question_name">
                </div>
                <div class="form-group">
                    <label for="question_answer1">Question Answer1</label>
                    <input type="text" name="question_answer1" class="form-control" id="question_answer1">
                </div>
                <div class="form-group">
                    <label for="question_answer2">Question Answer2</label>
                    <input type="text" name="question_answer2" class="form-control" id="question_answer2">
                </div>        
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="question_answer3">Question Answer3</label>
                    <input type="text" name="question_answer3" class="form-control" id="question_answer3">
                </div>
                <div class="form-group">
                    <label for="correct_answer">Correct Answer</label>
                    <input type="text" name="correct_answer" class="form-control" id="correct_answer">
                </div>
                <div class="form-group">
                    <label for="inputState">Exam Name</label>
                    <select id="inputState" name="exam_id" class="form-control">
                        <option selected>Choose...</option>
                        @foreach ($exams as $exam)
                            <option value="{{$exam->id}}">{{$exam->exam_name}}</option>
                        @endforeach  
                    </select>
                </div>
                
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Add question</button>
    </form>
</div>
@endsection
