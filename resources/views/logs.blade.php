@extends('layouts.main')


@section('content')




<h1 class="h3 mb-2 text-gray-800">Conversations</h1>
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<center> <a href="{{url('/')}}" class="btn btn-success">Go back to session</a></center>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Conversations</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
             
                        <th>Sender</th>
                        <th>Message</th>
                        <th>Channel</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
             
                        <th>Sender</th>
                        <th>Message</th>
                        <th>Channel</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $count=0 @endphp
            @foreach($logs as $log)
            @php
            $count++
            @endphp
            <tr>
                <td>{{$count}}</td>
                <td>{{$log->sender}}</td>
                <td>{{$log->message}}</td>
                <td>{{$log->channel}}</td>
                <td>{{$log->created_at}}</td>
                {{-- <td>2011/04/25</td>
                <td>$320,800</td> --}}
            </tr>
            

            @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



   
    

    @stop
