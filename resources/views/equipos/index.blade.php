@extends('layouts.admin')

@section('titulo')
    <span>Nuevo Equipo</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-file-excel"></i>
        Importar Datos en Archivo Excel
      </button>
      <a href="{{ route('equipos.export') }}" class="btn btn-danger"> 
        <i class="fas fa-file-excel"></i>
          Exportar Datos</a>

@endsection

@section('contenido')

    @include('equipos.modals.create')

    <div class="collapse" id="collapseExample">
        <div class="card card-header">
            <h5>Importar Archivo - Formato Excel</h5>
        </div>
        
        <div class="card card-body">
            @if (isset($errors) && $errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                {{$error}}
                @endforeach
            </div>
            @endif
            <form action="{{ url('Equipo/import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="import_file">
                
                <div class=" card card-footer">
                    <div class="button-container">
                    <button class="btn btn-sm btn-primary" type="submit">Guardar Datos</button>
                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                        Cerrar
                      </button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    <div class="card">
        <div class="table-responsive">

            <div class="card-body">
                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Código Patrimonial</th>
                            <th class="text-center">Serie</th>
                            <th class="text-center">Caracteristica</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Modelo</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $key => $equipo)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $equipo->cod_patrimonial }}</td>
                                <td>{{ $equipo->serie }}</td>
                                <td>{{ $equipo->caracteristica }}</td>
                                <td>{{ $equipo->categorias->nombre }}</td>
                                <td>{{$equipo->marcas->nombre}}</td>
                                <td>{{ $equipo->modelos->nombre }}</td>
                                <td>{{ $equipo->colors->nombre }}</td>
                                <td style="width: 10%" class="text-center text-sm">
                                    @if ($equipo->activo == '1')
                                        <span class="badge badge-success">activo</span>
                                    @else
                                        <span class="badge badge-danger">inactivo</span>
                                    @endif
                                </td>
                                <td>

                                    @if ($equipo->activo == '1')
                                        <a href="{{ url('Equipo/altabaja', [$equipo->activo, $equipo->id]) }}"><button
                                                type="button" class="btn btn-warning btn-sm"
                                                title="desactivar el estado de equipo"><i
                                                    class="fa fa-arrow-circle-down"></i></button></a>
                                    @else
                                        <a href="{{ url('Equipo/altabaja', [$equipo->activo, $equipo->id]) }}"><button
                                                type="button" class="btn btn-dark btn-sm"
                                                title="activar el estado de equipo"><i
                                                    class="fa fa-arrow-circle-up"></i></button></a>
                                    @endif
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                     title="Editar equipo" onclick="editmd({{ $equipo->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $equipo->id }}" title="eliminar equipo">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            @include('equipos.modals.update')
                            @include('equipos.modals.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <script>
        function editmd(iditem) {
           $('#editModal'+iditem).modal('show');
           console.log('presionado');
        }
    </script>

    @if (!$errors->isEmpty())
        @if ($errors->has('post'))
            <script>
                $(function() {
                    $('#createMdl').modal('show');
                });
            </script>
           
        @else
            <script>
                $(function() {
                    $('#editMdl').modal('show');
                });
            </script>
        @endif
    @endif
@endpush
