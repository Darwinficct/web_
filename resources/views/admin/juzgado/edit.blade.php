@extends('admin.layouts.template')

@section('header')
    Modificar Juzgado
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
                                <h1 class="h4 text-gray-900 mb-4">Editar juzgado</h1>
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

                            <form class="user" action="{{ route('admin.juzgado.update', $juzgado->id) }}"
                                method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_ciudad" aria-label="Default select example">
                                        {{-- <option selected>Selecciona la juzgado del juzgado</option> --}}
                                        @foreach ($ciudades as $ciudad)
                                            @if ($juzgado->id_ciudad == $ciudad->id)
                                                <option value="{{ $ciudad->id }}" selected>{{ $ciudad->nombre }}
                                                </option>
                                            @else
                                                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="codigo" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Codigo" value="{{$juzgado->codigo}}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="nombre" value="{{$juzgado->nombre}}">
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