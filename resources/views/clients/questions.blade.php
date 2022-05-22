<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Questions</title>

     <!-- Custom fonts for this template -->
     <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
     <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
 
     <!-- Custom styles for this template -->
     <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
 
     <!-- Custom styles for this page -->
     <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <a href="{{url('/admin/answers')}}" class="btn btn-success">Admin</a>
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-sm-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            <form action="{{url('clients/startquiz')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-1">

                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number" required />
                                        </div>
                                    </div>
                                </div>
                                
                            {{-- </form> --}}
                        </div>
                        <div>
                            {{-- Questions --}}
                            {{-- <form action="{{url('/')}}" method="POST" >
                                @csrf --}}
                            @foreach ($quiz as $q)

                            <input type="hidden" value="{{$q->id}}" name="question[]" />

                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 style="color: blue">  {{$q->title}} </h3>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer[{{$q->id}}]" id="inlineRadio1" value="5" required>
                                <label class="form-check-label" for="inlineRadio1">Very Good</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer[{{$q->id}}]" id="inlineRadio2" value="4" >
                                <label class="form-check-label" for="inlineRadio2">Good</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer[{{$q->id}}]" id="inlineRadio2" value="3" >
                                <label class="form-check-label" for="inlineRadio2">Bad</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer[{{$q->id}}]" id="inlineRadio2" value="2" >
                                <label class="form-check-label" for="inlineRadio2">Dissapointed</label>
                              </div>

                                </div>
                            </div>

                           
                              


                            @endforeach
                            <div class="row">
                                <div class="col-sm-1">

                                </div>
                                <div class="col-sm-5">
                                    <input type="submit" class="btn btn-primary" />
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>