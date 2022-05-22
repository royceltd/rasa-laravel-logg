<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\ChatLog;
use App\Models\LogSession;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    //


    public function getQuestions(){
        $quiz= Question::all();
        return view('clients.questions',compact('quiz'));
    }

    public function saveStartquiz(Request $request){
        // dd($request->all());
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


        return back()->with('status','Thanks for your feedback');

        

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

    
}
