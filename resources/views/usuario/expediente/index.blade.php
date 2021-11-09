@extends('usuario.layouts.template')

@section('header')
    Gestionar Expedientes
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Expedientes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Prueba</th>
                                <th>Titulo</th>
                                <th>Texto</th>
                                <th>Imagen</th>
                                <th>Recurso</th>
                                <th>Archivo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Prueba</th>
                                <th>Titulo</th>
                                <th>Texto</th>
                                <th>Imagen</th>
                                <th>Recurso</th>
                                <th>Archivo</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($expedientes as $expediente)
                                <tr>
                                    <td>{{ $expediente->id_prueba }}</td>
                                    <td>{{ $expediente->titulo }}</td>
                                    <td>{{ $expediente->texto }}</td>
                                    <td>
                                        <img style="width: 50%" src="{{ asset('/storage/' . $expediente->url_imagen) }}"
                                            alt="...">
                                    </td>
                                    <td> {{ $expediente->url_recurso }}</td>
                                    <td>
                                        <a href="{{ asset('/storage/' . $expediente->url_archivo) }}">
                                            archivo
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('usuario.expediente.edit', $expediente->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{ route('usuario.expediente.delete', $expediente->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Eliminar</span>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


                <a href="{{ route('usuario.expediente.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Expediente</span>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection