@extends('usuario.layouts.template')

@section('header')
    Crear nueva Prueba
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

                            <form class="user" action="{{ route('usuario.prueba.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_caso" aria-label="Default select example">
                                        {{-- <option selected>Selecciona la prueba del prueba</option> --}}
                                        @foreach ($casos as $caso)
                                            <option value="{{ $caso->id }}">{{ $caso->nombre }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Nombre">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="5"></textarea>
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