@extends('layouts.admin')

@section('titulo')
    <span>Equipos Dados de Baja</span>

      <a href="{{ route('equipos.export_baja_equipo') }}" class="btn btn-danger"> 
        <i class="fas fa-file-excel"></i>
          Exportar Datos</a>

@endsection

@section('contenido')

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
                                   
                                    
                                </td>
                            </tr>

                            
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
