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
    <br />

   

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
             
                <th>Session</th>
               
                <th>Date</th>
                <th>Action</th>
                {{-- <th>Start date</th>
                <th>Salary</th> --}}
            </tr>
        </thead>
        <tbody>
            @php $count=1 @endphp
            @foreach($sessions as $session)
            @php
            $count++
            @endphp
            <tr>
                <td>{{$count}}</td>
                <td>{{$session->session_id}}</td>
                
                <td>{{$session->created_at}}</td>
                <td>
                  <button>  <a href="{{url('/session',$session->session_id)}}">View conversations</a></button>
                </td>
               
            </tr>
            

            @endforeach
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
             
                <th>Session</th>
               
                <th>Date</th>
                <th>Action</th>
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