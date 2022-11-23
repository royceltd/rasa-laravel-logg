
@extends('layouts.main')
   

   
@section('content')


<div class="row">
    <div class="col-sm-6">
        <h1 class="h3 mb-2 text-gray-800">Clients</h1>
        
    </div>
    <div class="col-sm-6">
       

    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="{{url('admin/excel-export')}}" class="btn btn-primary">Export database</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
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
                <td>{{$response->name}}</td>
                <td>{{$response->phone}}</td>
                <td>{{$response->email}}</td>
                
                <td>
                    {{$response->created_at}}
                </td>

                <td>
                    <a href="{{url('/admin/responses',$response->phone)}}" class="btn btn-success">Open</a>
                    
                </td>
                
               
            </tr>
            

            @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



  
  

    @stop
