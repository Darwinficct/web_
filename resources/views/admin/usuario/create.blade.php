@extends('admin.layouts.template')
@section('header')
    Crear Nuevo Procurador
@endsection
@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Crear procurador</h1>
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
                        <form class="user" action="{{route('admin.usuario.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                            <select class="form-select" name="id_juzgado" aria-label="Default select example">
                               {{-- <option selected>Selecciona la Juzgado del usuario</option>--}}
                                @foreach ($juzgados as $juzgado)
                                    <option value="{{$juzgado->id}}">{{$juzgado->nombre}}</option>
                                    
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="ci" class="form-control form-control" id="exampleInputEmail"
                                    placeholder="Ci">
                            </div>

                            <div class="form-group">
                                <input type="text" name="nombre"class="form-control form-control" id="exampleInputEmail"
                                    placeholder="Nombre">
                            </div>
                         
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control" id="exampleInputEmail"
                                    placeholder="Email">
                            </div>
                         
                            <div class="form-group">
                                <input type="password" name="password"class="form-control form-control" id="exampleInputEmail"
                                    placeholder="Contraseña">
                            </div>
                         
                         
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Aceptar">
                              
                            <hr>
                           
                        </form>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection