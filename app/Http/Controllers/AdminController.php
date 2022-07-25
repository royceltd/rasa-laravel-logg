<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Customer;
use App\Models\Question;
use App\Models\Response;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public function saveUsers(Request $request){
        $usr= new User;
        $usr->name= $request->name;
        $usr->email= $request->email;
        $usr->password= Hash::make($request->password);
        $usr->role=$request->role;
        $usr->save();

        return back()->with('status','User Added Successfully');

    }


    public function users(){
        $users= User::orderBy('id','ASC')->get();
        
        return view('admin.users',compact('users'));


    }

    public function AddQuestion(Request $request){
        $quiz= new Question;
        $quiz->title= $request->question;
        $quiz->code= $request->code;
        $quiz->added_by= auth()->user()->id;
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

    public function statistics(Request $request){

        
        $answers = DB::table('questions')->join('answers','answers.question_id','=','questions.id')->join('ratings','ratings.id','=','answers.answer')->where(function($query){
           
        })
       
        ->when($request->filled('from'),function($query)use($request){
            $query->whereDate('answers.created_at','>=',$request->from);
        })
        ->when($request->filled('to'),function($query)use($request){
            $query->whereDate('answers.created_at','<=',$request->to);
        })
        ->select('question_id','code','answer','name',DB::raw('COUNT(answers.id) as response,CONCAT(code,": ",name) as identifier')
        )->when($request->filled('question'),function($query)use($request){
            $query->where('question_id',$request->question);
        })->groupBy('question_id','code','answer','name')->get();

        $question_anwers = [];

        foreach($answers as $answer){
            $question_anwers[$answer->identifier] = array($answer->identifier,$answer->response);
        }
       
        $chart1 = json_encode(array_values($question_anwers));
        $questions= Question::all();
        if($request->question){
            $question="Chart for: ". Question::find($request->question)->title;
        }else{
            $question="";

        }
        return view('chart1', compact('chart1','questions','question'));



    }

    public function changePassword(){
        return view('admin.change-password');
    }

    public function pChangePassword(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (!(Hash::check($request->get('current-password'), auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        $usr= User::find(auth()->user()->id);
        $usr->password=Hash::make($request->get('current-password'));
        $usr->save();
        return redirect()->back()->with("status","Password Changed successfully");





    }
}
