<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\ChatLog;
use App\Models\Customer;
use App\Models\LogSession;
use App\Models\Question;
use App\Models\Response;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class SiteController extends Controller
{
    //


    public function getQuestions(){
        $quiz= Question::all();
        return view('clients.questions',compact('quiz'));
    }
    public function welcome(){
        return view('clients.welcome');
    }

    public function newCustomer(){
        return view('clients.new-customer');
    }

    public function saveCustomer(Request $request){
        $customer= Customer::where('phone','=',$request->phone_number)->first();

        if(!$customer){
            $customer= new Customer;
            $customer->name=$request->name;
            $customer->email=$request->email;
            $customer->phone=$request->phone_number;
            $customer->save();
        }

        $newvisit= new Visit;
        $newvisit->phone_number=$request->phone_number;
        $newvisit->person_to_see=$request->person_to_see;
        $newvisit->save();

        return redirect('/')->with('status','Welcome to KRB. Please give us your feedback after.');



    }

    public function saveStartquiz(Request $request){
        // dd($request->all());
        $response= new Response;
        $response->phone_number=$request->phone_number;
        $response->save();


        $arr= array_combine($request->question,$request->answer);

        // print_r($arr);

        foreach($arr  as $key=>$value){

            // echo $key."".$value;
            $ans= new Answer;

            $ans->question_id=$key;
            $ans->phone_number=$request->phone_number;
            $ans->answer=$value;

            $ans->save();

        }


        return redirect('/')->with('status','Thanks for your feedback');

        

    }

    public function saveLogs(Request $request){
        // Log::info("hello");
        $res=LogSession::where('session_id',$request->uid)->first();
        if(!$res){
            $news= new LogSession;
            $news->session_id=$request->uid;
            $news->save();

        }
        $log= new ChatLog;
        $log->sender=$request->sender;
        $log->timestamp=$request->time_stamp;
        $log->message=$request->message;
        $log->channel=$request->channel;
        $log->session_id=$request->uid;
        $log->save();
        Log::info($request->all());
    }

    public function getLogs($id){
        $logs= ChatLog::where('session_id','=',$id)->get();

        return view('logs', compact('logs'));
    }

    public function getSessions(){
        $sessions=LogSession::orderBy('id','DESC')->get();
        
        return view('sessions',compact('sessions'));
    }

    public function chatbot(){
        return view('chatbot');
    }
    public function testChart(Request $request){
        $answers = DB::table('questions')->join('answers','answers.question_id','=','questions.id')->join('ratings','ratings.id','=','answers.answer')->where(function($query){
            $query->whereDate('answers.created_at','<=',date('Y-m-d'));
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
        return view('chart1', compact('chart1'));



    }

    
}
