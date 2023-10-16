@extends('layouts.admin')

@section('titulo')
    <span>Reporte por rango de fechas</span>
    
@endsection

@section('contenido')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-print"></i>&nbsp;<a href="home">Inicio</a></li>
    <li class="breadcrumb-item active">Reporte por rango de fechas</li>
</ol>
    <div class="card">
        <div class="table-responsive">

            <div class="card-body">

                <form action="{{ route('reporte_resultado') }}" role="form" method="POST" enctype="multipart/form-data"
                    id="createCargotFrm">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-12 col-md-2 text-center">
                            <span>Fecha inicial</span>
                            <div class="form-group">
                                <input class="form-control" type="date" value="{{ old('fecha_ini') }}" name="fecha_ini"
                                    id="fecha_ini">
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <span>Fecha final</span>
                            <div class="form-group">
                                <input class="form-control" type="date" value="{{ old('fecha_fin') }}" name="fecha_fin"
                                    id="fecha_fin">
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Consultar
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <br>
                            <div class="form-group">
                                <a href="#" onclick="reporte()" class="btn btn-info"> <i
                                        class="fas fa-file-pdf"></i>
                                    Imprimir</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <br>
                            <div class="form-group">
                                <a href="{{ route('Operacion_equipos.export_operacion_equipo') }}"  class="btn btn-danger"> <i
                                        class="fas fa-file-excel"></i>
                                    Exportar</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <br>
                            <div class="form-group">
                                <a href="reporte_fecha" class="btn btn-warning"> <i
                                        class="fas fa-eraser"></i>
                                    Limpiar</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <span>Cantidad de registro: <b> </b></span>
                            <div class="form-group">
                                {{ $operacion_equipos->count() }}
                            </div>
                        </div>
                    </div>

                </form>

                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Locador</th>
                            <th class="text-center">Serie</th>
                            <th class="text-center">Cod. Patrimonial</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Marca</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operacion_equipos as $key => $operacion)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $operacion->nombres }} {{ $operacion->apellidos }}</td>
                                <td>{{ $operacion->serie }}</td>
                                <td>{{ $operacion->cod_patrimonial }}</td>
                                <td>{{ $operacion->cat }}</td>
                                <td>{{ $operacion->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
      function reporte() {

            let ini = $('#fecha_ini').val();
            let fin = $('#fecha_fin').val();


            
            let ruta = "{{ route('decargar-pdf') }}";
            ruta = ruta + '?fecha_ini=' + ini + '&fecha_fin='+fin;

            // console.log(ruta);
            window.open(ruta, '_blank');
        }
    </script>
@endpush
