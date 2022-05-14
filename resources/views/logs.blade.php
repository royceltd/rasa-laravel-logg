@extends('layouts.main')




<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



    <br />
   <center> <button> <a href="{{url('/')}}">Go back to session</a></button></center>
    <br />
    

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
             
                <th>Sender</th>
                <th>Message</th>
                <th>Channel</th>
                <th>Date</th>
                {{-- <th>Start date</th>
                <th>Salary</th> --}}
            </tr>
        </thead>
        <tbody>
            @php $count=1 @endphp
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
        <tfoot>
            <tr>
                <th>#</th>
                <th>Sender</th>
                <th>Message</th>
                <th>Channel</th>
                <th>Date</th>
            </tr>
        </tfoot>
    </table>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    
