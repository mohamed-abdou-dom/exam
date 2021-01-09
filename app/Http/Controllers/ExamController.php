<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Question;
use Auth;

class ExamController extends Controller
{
    public function __construct() 
    {
    $this->middleware('auth');
    }

    public function Welcome()
    {
        return view('welcome');
    }

    public function Home()
    {
        $exams = Exam::withCount('questions')->get();
        return view('exam.home',compact('exams'));
    }

    public function ShowExam($id)
    {
        $exam_id = $id;
        $questions = Question::where('exam_id','=',$id)->get();
        return view('exam.exam',compact('questions','exam_id'));
    }

    public function ShowResult(Request $request)
    {

        if ($request->isMethod('POST'))
        {
            $questions = Question::where('exam_id','=',$request->exam_id)->select('correct_answer')->get();
            $exam_result = Exam::where('id','=',$request->exam_id)->select('exam_name','total_result')->first();
            $question_mark = $exam_result['total_result']/ $questions->count();
            $marks = 0;

            foreach ($questions as $index=>$question) {
                $index+=1;
                if($request->input('answer'.$index) == $question['correct_answer']){
                    $marks+=$question_mark;
                }
            }
            return view('exam.result',compact('marks','exam_result'));
        }

    }
}