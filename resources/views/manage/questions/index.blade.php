@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage questions
            <a href="{{ route('questions.create') }}" class="btn btn-light float-right">Add New question</a>
        </h2>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Correct Ans.</th>
            <th scope="col">Exam Name</th>
            <th scope="col">Created_at</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{$question->question_no}}</td>
                    <td>{{$question->question_name}}</td>
                    <td>{{$question->correct_answer}}</td>
                    <td>{{$question->exam->exam_name}}</td>
                    <td>{{$question->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{ route('questions.show', $question->id) }}" class="btn btn-outline-primary">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$questions->links()}}
</div>
@endsection