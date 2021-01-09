@extends('layouts.app')

@section('content')

<div class="container welcome">
    <div class="row">
        <div class="col-md-6">
            <div class="content">
                <h2>LaraExam</h2>
                <p>
                    it's a web application divided into two section, the first section is the mangement area in this you can manage
                    your web application data such as "users, roles, permissions, questions, answers and exams", the other section
                    is the exam area in this you can take any exam from the exams page and answers all the question for this exam and
                    then you will take the result with the correct answers for wrong answers also you can manage your exams and profile details.
                    @if (Auth::user())<a href="/home">Home</a>@else<a href="/register">Register</a>@endif
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <img src="./images/welcome.png" width="100%" height="100%">
        </div>
    </div>
</div>

@endsection
