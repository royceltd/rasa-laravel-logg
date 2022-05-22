<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //'

    public function questions(){
        $questions= Question::orderBy('id','ASC')->get();
        
        return view('admin.add-question',compact('questions'));
    }

    public function AddQuestion(Request $request){
        $quiz= new Question;
        $quiz->title= $request->question;
        $quiz->added_by= 1;
        $quiz->save();

        return back()->with('status','Question added successfully');

    }
}
