
@extends('layouts.main')
   

   
@section('content')



<h1 class="h3 mb-2 text-gray-800">Logs</h1>
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rasa Logs</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Session</th>
                        <th>Date</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Session</th>
                        <th>#</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>

                    </tr> --}}
                    @php $count=0 @endphp
            @foreach($sessions as $session)
            @php
            $count++
            @endphp
            <tr>
                <td>{{$count}}</td>
                <td>{{$session->session_id}}</td>
                
                <td>{{$session->created_at}}</td>
                <td>
                   <a href="{{url('/session',$session->session_id)}}"  class="btn btn-sm btn-success">View conversations</a>
                </td>
               
            </tr>
            

            @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>




    @stop
