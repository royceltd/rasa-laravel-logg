<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Customer;
use App\Models\Question;
use App\Models\Response;
use App\Models\Visit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //'

    public function __construct()
    {

        $this->middleware('auth');
        
    }

    public function responses(){
        $response=Customer::orderBy('id','DESC')->get();
        return view('admin.responses',compact('response'));
    }

    public function getVisits(){
        $visits= Visit::join('customers','customers.phone','=','visits.phone_number')
        ->select('customers.*','visits.person_to_see','visits.created_at as dt','visits.id as uid')
        ->orderBy('uid','DESC')->get();
        return view('admin.visits',compact('visits'));
    }

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

    public function getAnswers($id){
        $answers= Answer::join('questions','questions.id','=','answers.question_id')
        ->select('questions.title','answers.*')
        ->where('answers.phone_number',$id)
        ->get();
        return view('admin.answers', compact('answers'));
    }
}
