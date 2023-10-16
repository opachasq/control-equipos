@extends('layouts.admin')

@section('titulo')
    <span>Nueva Operacion</span>

    <a href="{{ route('operaciones.create')}}" class="btn btn-success btn-circle" >
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    
    <div class="card">
        <div class="table-responsive">

            <div class="card-body">
                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Locador</th>
                            <th class="text-center">Celular</th>
                            <th class="text-center">Fecha de Devolución</th>
                            <th class="text-center">Hora</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operaciones as $key => $operacion)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $operacion->locadors->nombres }} {{ $operacion->locadors->apellidos }}  </td>
                                <td>{{ $operacion->locadors->celular }}</td>
                                <td>{{ $operacion->fecha }}</td>
                                <td>{{ $operacion->hora }}</td>
                                <td style="width: 10%" class="text-center text-sm">
                                    @if ($operacion->activo == '1')
                                        <span class="badge badge-success">activo</span>
                                    @else
                                        <span class="badge badge-danger">inactivo</span>
                                    @endif
                                </td>
                                <td>

                                    @if ($operacion->activo == '1')
                                        <a href="{{ url('Operacion/altabaja', [$operacion->activo, $operacion->id]) }}"><button
                                                type="button" class="btn btn-warning btn-sm"
                                                title="desactivar el estado de operacion"><i
                                                    class="fa fa-arrow-circle-down"></i></button></a>
                                    @else
                                        <a href="{{ url('Operacion/altabaja', [$operacion->activo, $operacion->id]) }}"><button
                                                type="button" class="btn btn-dark btn-sm"
                                                title="activar el estado de operacion"><i
                                                    class="fa fa-arrow-circle-up"></i></button></a>
                                    @endif
                                    <a href="{{ url('Operacion_equipos/imprimir', $operacion->id) }}"
                                        class="btn btn-dark  btn-sm"><i class="fas fa-file-pdf"></i></a>

                                    <a href="{{ route('operaciones.show', $operacion->id) }}" class="btn btn-info  btn-sm">
                                        <i class="fas fa-eye"></i></a>

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        title="Editar operacion" onclick="editmd({{ $operacion->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a href="{{ url('Operacion_equipos/operacion_equipo', $operacion->id) }}"
                                        class="btn btn-danger  btn-sm"><i class="fa fa-folder-plus"></i></a>
                                    
                                </td>
                            </tr>
                            @include('operaciones.modals.update')
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
            $('#editModal' + iditem).modal('show');
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
        @endif

        @if ($errors->has('put'))
            <script>
                $(function() {
                    $('#editMdl').modal('show');
                });
            </script>
        @endif
    @endif
    @if (Session::has('buscar'))
        <script>
            $(function() {
                $('#createMdl').modal('show');
            });
        </script>
    @endif
@endpush
