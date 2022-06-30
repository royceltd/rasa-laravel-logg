
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
                        <th>Phone Number</th>
                        <th>Read?</th>
                        {{-- <th>Score</th> --}}
                        <th>Date</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Phone Number</th>
                        <th>Read?</th>
                        {{-- <th>Score</th> --}}
                        <th>Date</th>
                        <th>Action</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                    
                    @php $count=0 @endphp
            @foreach($response as $response)
            @php
            $count++
            @endphp
            <tr>
                <td>{{$count}}</td>
                <td>{{$response->phone_number}}</td>

                <td>
                    @if(is_null($response->read))
                    No

                    @else
                    Yes at: {{$response->read}}

                    @endif
                    
                </td>
                
                
                <td>
                    {{$response->created_at}}
                </td>

                <td>
                    <a href="{{url('/admin/responses',$response->phone_number)}}" class="btn btn-success">Open</a>
                    
                </td>
                
               
            </tr>
            

            @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



  
  

    @stop
