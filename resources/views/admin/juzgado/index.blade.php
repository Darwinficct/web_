@extends('admin.layouts.template')

@section('header')
    Gestionar Juzgados
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Juzgados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ciudad</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ciudad</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($juzgados as $juzgado)
                                <tr>
                                    <td>{{ $juzgado->id_ciudad }}</td>
                                    <td>{{ $juzgado->codigo }}</td>
                                    <td>{{ $juzgado->nombre }}</td>
                                    <td>
                                        <a href="{{route('admin.juzgado.edit',$juzgado->id)}}" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{route('admin.juzgado.delete',$juzgado->id)}}" method="POST">
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


                <a href="{{ route('admin.juzgado.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nueva Juzgado</span>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection