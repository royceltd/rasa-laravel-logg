
@extends('layouts.main')
   

   
@section('content')


<div class="row">
    <div class="col-sm-6">
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        
    </div>
    <div class="col-sm-6">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Add User
  </button>

    </div>
</div>


{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        {{-- <th>Action</th> --}}
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
            @foreach($users as $question)
            @php
            $count++
            @endphp
            <tr>
                <td>{{$count}}</td>
                <td>{{$question->name}}</td>
                <td>{{$question->email}}</td>
                
                <td>{{$question->created_at}}</td>
                {{-- <td>
                   <a href="{{url('/delete-question',$question->id)}}"  class="btn btn-sm btn-success">Delete</a>
                </td> --}}
               
            </tr>
            

            @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action={{url('/admin/users')}} method="POST">
        @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-sm-6">
                    <div class="form-group">
                        <label>
                            Name
                        </label>
                        <input type="text" name="name" placeholder="Name" class="form-control" />
                    </div>
                  
              </div>
              <div class="col-sm-6">
                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        <input type="email" name="email" placeholder="Email Address" class="form-control" />
                    </div>
                  
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                    <div class="form-group">
                        <label>
                            Deafault Password
                        </label>
                        <input type="text" name="password" placeholder="Password" class="form-control" value="P@ssw0rd" readonly />
                    </div>
                  
              </div>
              <div class="col-sm-6">
                    <div class="form-group">
                        <label>
                            Role
                        </label>
                        <select class="form-control" name="role">
                            <option value="">Select...</option>
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                  
              </div>
              
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add User</button>
        </div>
      </div>
    </div>
</form>
  </div>

    @stop
