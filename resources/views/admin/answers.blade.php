
@extends('layouts.main')
   

   
@section('content')


<div class="row">
    <div class="col-sm-6">
        <h1 class="h3 mb-2 text-gray-800">Responses</h1>
        
    </div>
    <div class="col-sm-6">
       

    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Responses</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Phone Number</th>
                        <th>Score</th>
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Phone Number</th>
                        <th>Score</th>
                        <th>Date</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                    
                    @php $count=0 @endphp
            @foreach($answers as $answer)
            @php
            $count++
            @endphp
            <tr>
                <td>{{$count}}</td>
                <td>{{$answer->title}}</td>
                <td>{{$answer->phone_number}}</td>
                <td>{{$answer->answer}}</td>
                
                <td>{{$answer->created_at}}</td>
                
               
            </tr>
            

            @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



  
  

    @stop
