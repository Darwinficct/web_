@extends('admin.layouts.template')

@section('header')
    Gestionar Casos
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Casos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Juzgado</th>
                                <th>Sigla</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Juzgado</th>
                                <th>Sigla</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($casos as $caso)
                                <tr>
                                    <td>{{ $caso->id_juzgado }}</td>
                                    <td>{{ $caso->sigla }}</td>
                                    <td>{{ $caso->nombre }}</td>
                                    <td>
                                        <a href="{{route('admin.caso.edit',$caso->id)}}" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{route('admin.caso.delete',$caso->id)}}" method="POST">
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


                <a href="{{ route('admin.caso.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nueva Caso</span>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection