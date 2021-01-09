@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage Exams
            <a href="{{ route('exams.create') }}" class="btn btn-light float-right">Add New Exam</a>
        </h2>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Result</th>
            <th scope="col">Created_at</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{$exam->exam_name}}</td>
                    <td>{{$exam->total_result}}</td>
                    <td>{{$exam->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{ route('exams.show', $exam->id) }}" class="btn btn-outline-primary">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$exams->links()}}
</div>
@endsection