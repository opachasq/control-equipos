@extends('layouts.admin')

@section('titulo')
    <span>Nuevo Locador</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')

    @include('locadores.modals.create')


    <div class="card">
        <div class="table-responsive">

            <div class="card-body">
                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Dni</th>
                            <th class="text-center">Código</th>
                            <th class="text-center">Locador</th>
                            <th class="text-center">Genero</th>
                            <th class="text-center">celular</th>
                            <th class="text-center">Oficina</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locadors as $key => $locador)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $locador->dni }}</td>
                                <td>{{ $locador->codigo }}</td>
                                <td>{{ $locador->nombres }} {{ $locador->apellidos }}</td>
                                <td>{{ $locador->generos->nombre }}</td>
                                <td>{{ $locador->celular }}</td>
                                <td>{{$locador->areas->nombre}}</td>
                                <td style="width: 10%" class="text-center text-sm">
                                    @if ($locador->activo == '1')
                                        <span class="badge badge-success">activo</span>
                                    @else
                                        <span class="badge badge-danger">inactivo</span>
                                    @endif
                                </td>
                                <td>

                                    @if ($locador->activo == '1')
                                        <a href="{{ url('Locador/altabaja', [$locador->activo, $locador->id]) }}"><button
                                                type="button" class="btn btn-warning btn-sm"
                                                title="desactivar el estado de Locador"><i
                                                    class="fa fa-arrow-circle-down"></i></button></a>
                                    @else
                                        <a href="{{ url('Locador/altabaja', [$locador->activo, $locador->id]) }}"><button
                                                type="button" class="btn btn-dark btn-sm"
                                                title="activar el estado de equipo"><i
                                                    class="fa fa-arrow-circle-up"></i></button></a>
                                    @endif
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                     title="Editar locador" onclick="editmd({{ $locador->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $locador->id }}" title="eliminar locador">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            @include('locadores.modals.update')
                            @include('locadores.modals.delete')
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
