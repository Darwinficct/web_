
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesion como administrador</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/AdminTemplate/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   

    <!-- Custom styles for this template-->
    <link href="{{asset('/AdminTemplate/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        
                          <div
                            <div class="col-lg-17">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">BIENVENIDO!!!</h1>
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                   
                                    <form class="user" action="{{route('admin.login')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                                placeholder="Introduce tu email..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            name="password"
                                                id="exampleInputPassword" placeholder="Introduce tu contrase??a..." required>
                                       <br>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Iniciar sesion">
                                            
                                        <hr>
                                       
                                    </form>
                                    <hr>
                                   
                                </div>
                            </div>
                        
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/AdminTemplate/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/AdminTemplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/AdminTemplate/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/AdminTemplate/js/sb-admin-2.min.js')}}"></script>

</body>

</html>