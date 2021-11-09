<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Expedientes</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('ClienteTemplate/dist/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('admin.login')}}">Abogados</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('usuario.login')}}">Procuradores</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{asset('ClienteTemplate/dist/assets/img/post-bg.jpg')}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Expedientes</h1>
                        <h2 class="subheading">{{ $prueba->descripcion }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    @foreach ($expedientes as $expediente)

                        <h2 class="section-heading">{{ $expediente->titulo }}</h2>

                        @if (!is_null($expediente->texto))
                            <p>
                                {{ $expediente->texto }}
                            </p>
                        @endif

                        @if (!is_null($expediente->url_recurso))
                            <p>
                                Recurso:
                            </p>
                            <p>
                                <a href="{{ $expediente->url_recurso }}">{{ $expediente->url_archivo }}</a>

                            </p>
                        @endif

                        @if (!is_null($expediente->url_imagen))
                            <p>
                                <img class="img-fluid" src="{{ asset('/storage/' . $expediente->url_imagen) }}"
                                    alt="..." />
                            </p>
                        @endif

                        @if (!is_null($expediente->url_archivo))
                            <p>
                                Archivo:
                            </p>
                            <p>
                                <a
                                    href="{{ asset('/storage/' . $expediente->url_archivo) }}">{{ $expediente->url_archivo }}</a>
                            </p>
                        @endif

                    @endforeach

                    <br>
                    <a href="{{route('index')}}" class="btn btn-primary btn-user btn-block">Volver al menu principal</a>
                </div>
            </div>
        </div>
    </article>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        
                        
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Darwin Acosta Garcia 2021</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('ClienteTemplate/dist/js/scripts.js') }}"></script>
</body>

</html>