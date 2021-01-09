@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card text-center py-5">
        <div class="card-body">
          <h5 class="card-title">{{$exam_result['exam_name']}} Result</h5>
          <p class="card-text">Your Result : {{$marks}}</p>
          <p class="card-text">Total Result : {{$exam_result['total_result']}}</p>
          <p class="card-text">Percentage Result : {{$marks/100*100}}%</p>
        </div>
    </div>
</div>
@endsection