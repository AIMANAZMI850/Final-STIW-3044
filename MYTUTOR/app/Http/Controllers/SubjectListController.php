<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;


class SubjectListController extends Controller
{
    public function saveSubject(Request $request)
    {
        echo json_encode($request->all());
        $newSubject = new Subject();
        $newSubject->subject_title = $request->subjecttitle;
        $newSubject->subject_description = $request->subjectdescription;
        $newSubject->subject_price = $request->subjectprice;
        $newSubject->total_learning_hours = $request->totallearninghours;
        $newSubject->save();
        return redirect('mainpage')->with('save', 'Success')->withErrors('error', 'Failed');
    }

    public function mainpage()
    {
        if (Auth::check()) {
            return view('mainpage', ['listSubjects' => Subject::all()]);
        }
        return redirect("loginpage")->withSuccess('You do not have access');
    }
    public function markDelete($id)
    {
        $listSubjects = Subject::find($id);
        $listSubjects->delete();
        return redirect('mainpage');
    }

    public function markUpdate($id, Request $request)
    {
        $listSubjects = Subject::find($id);
        $listSubjects->subject_title = $request->subjecttitle;
        $listSubjects->subject_description = $request->subjectdescription;
        $listSubjects->subject_price = $request->subjectprice;
        $listSubjects->total_learning_hours = $request->totallearninghours;
        $listSubjects->update();
        return redirect('mainpage');
    }
}