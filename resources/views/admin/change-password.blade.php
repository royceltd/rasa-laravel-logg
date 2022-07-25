
@extends('layouts.main')
   

   
@section('content')


<div class="row">
    <div class="col-sm-6">
        <h1 class="h3 mb-2 text-gray-800">Change password</h1>
        
    </div>
    <div class="col-sm-6">
        <!-- Button trigger modal -->


    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif
    </div>
</div>


{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Change password</h6>
    </div>
    <div class="row">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
    <div class="card-body">
        <form method="POST"  action="{{url('admin/change-password')}}">
            @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>
                        Current Passowrd
                    </label>
                    <input type="password" name="current_password" class="form-control" value="{{old('current_password')}}" required />
                </div>

            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>
                        New Passowrd
                    </label>
                    <input type="password" name="new_password" class="form-control" value="{{old('new_password')}}" required />
                </div>

            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>
                       Confirm New Passowrd
                    </label>
                    <input type="password" name="confirm_password" class="form-control"  value="{{old('confirm_password')}}" required />
                </div>

            </div>

        </div>
        {{-- <br /> --}}
        <div class="row">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-success" value="Change Password" />
            </div>

        </div>
    </form>
    </div>
</div>



  
  

    @stop
