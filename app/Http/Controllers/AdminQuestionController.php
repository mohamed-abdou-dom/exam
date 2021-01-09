<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Exam;

class AdminQuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id','DESC')->with('exam')->paginate();
        return view('manage.questions.index',compact('questions'));
    }

    public function create()
    {
        $exams = Exam::all();
        return view('manage.questions.create',compact('exams'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'question_no' => 'required',
            'question_name' => 'required|min:5',
            'question_answer1' => 'required|min:5',
            'question_answer2' => 'required|min:5',
            'question_answer3' => 'required|min:5',
            'correct_answer' => 'required|min:5',
            'exam_id' => 'required',
        ]);

        $question = new Question();
        $question->question_no = $request->question_no;
        $question->question_name = $request->question_name;
        $question->question_answer1 = $request->question_answer1;
        $question->question_answer2 = $request->question_answer2;
        $question->question_answer3 = $request->question_answer3;
        $question->correct_answer = $request->correct_answer;
        $question->exam_id = $request->exam_id;
        $question->save();

        return redirect()->route('questions.index');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id)->with('exam')->first();
        return view('manage.questions.show',compact('question'));
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id)->with('exam')->first();
        $exams = Exam::all();
        return view('manage.questions.edit',compact(['question','exams']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'question_no' => 'required',
            'question_name' => 'required|min:5',
            'question_answer1' => 'required|min:5',
            'question_answer2' => 'required|min:5',
            'question_answer3' => 'required|min:5',
            'correct_answer' => 'required|min:5',
            'exam_id' => 'required',
        ]);

        $question = Question::findOrFail($id);
        $question->question_no = $request->question_no;
        $question->question_name = $request->question_name;
        $question->question_answer1 = $request->question_answer1;
        $question->question_answer2 = $request->question_answer2;
        $question->question_answer3 = $request->question_answer3;
        $question->correct_answer = $request->correct_answer;
        $question->exam_id = $request->exam_id;
        $question->save();

        return redirect()->route('questions.show',$id);
    }

    public function destroy($id)
    {
        //
    }
}
