<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;

class AdminExamController extends Controller
{
    public function index()
    {
        $exams = Exam::orderBy('id','DESC')->paginate(8);
        return view('manage.exams.index',compact('exams'));
    }

    public function create()
    {
        return view('manage.exams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'total_result' => 'required',
        ]);

        $exam = new Exam();
        $exam->exam_name = $request->name;
        $exam->total_result = $request->total_result;
        $exam->save();

        return redirect()->route('exams.index');
    }

    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view('manage.exams.show',compact('exam'));
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('manage.exams.edit',compact('exam'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'total_result' => 'required',
        ]);

        $exam = Exam::findOrFail($id);
        $exam->exam_name = $request->name;
        $exam->total_result = $request->total_result;
        $exam->save();

        return redirect()->route('exams.show',$id);
    }

    public function destroy($id)
    {
        //
    }
}
