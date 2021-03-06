@extends('usuario.layouts.template')

@section('header')
    Crear nuevo Prueba
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
                                <h1 class="h4 text-gray-900 mb-4">Crear prueba</h1>
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

                            <form class="user" action="{{ route('usuario.prueba.update',$prueba->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_caso" aria-label="Default select example">
                                        
                                        @foreach ($casos as $caso)
                                            @if ($prueba->id_caso == $caso->id)
                                                <option value="{{ $caso->id }}" selected>{{ $caso->nombre }}
                                                </option>
                                            @else
                                                <option value="{{ $caso->id }}">{{ $caso->nombre }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Nombre" value="{{$prueba->nombre}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="5">
                                        {{$prueba->descripcion}}
                                    </textarea>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Aceptar">

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection