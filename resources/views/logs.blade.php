<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   <!-- CSS only -->
   <!-- CSS only -->
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
{{-- <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}
<!-- JavaScript Bundle with Popper -->


    
</head>
<body>
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
    
</body>
</html>