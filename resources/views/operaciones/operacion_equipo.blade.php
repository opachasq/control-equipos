@extends('layouts.admin')

@section('titulo')
    <span>Asignar Equipos</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('operaciones.index') }}">index</a></li>
        <li class="breadcrumb-item active">Asignar Equipos</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title">Asignar Equipos</h4>
                        </div>
                        <div class="body">
                          
                            <form action="{{ route('operacion_equipos.store') }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <input type="text" class="form-control" name="operacion_id" value="{{ $operaciones->id }}">
                                            <label for="equipo" class="form-fields">Equipos</label>
                                            <input list="equipo_id" placeholder="Buscar equipo" name="equipo_id">
                                            <datalist id="equipo_id">
                                                @foreach ($equipos as $equipo)
                                                <option value="{{ $equipo->id}}" selected>{{ $equipo->serie }}</option>
                                            @endforeach
                                            </datalist>

                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-9 form-group">
                                       <hr>
                                        <div class="buttons-form-submit d-flex justify-content-center">
                
                                            <button type="submit" href="#" class="btn btn-primary">
                                                Agregar
                                            </button>
                                            <a href="#" class="btn btn-success mr-1"> Volver</a>
                                            
                                        </div>
                                    </div>
                                   
                                </div>
                        </div>
                        <div>
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
                                                @foreach ($operacion_equipos as $key => $operacion)
                                                    <tr class="text-center">
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $operacion->serie }}</td>
                                                        
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
                                                            <a href="{{ url('Operacion/imprimir', $operacion->id) }}"
                                                                class="btn btn-dark  btn-sm"><i class="fas fa-file-pdf"></i></a>
                        
                                                            <a href="{{ route('operaciones.show', $operacion->id) }}" class="btn btn-info  btn-sm">
                                                                <i class="fas fa-eye"></i></a>
                        
                                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                                title="Editar operacion" onclick="editmd({{ $operacion->id }})">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <a href="{{ url('Operacion/operacion_equipo', $operacion->id) }}"
                                                                class="btn btn-danger  btn-sm"><i class="fa fa-folder-plus"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                        
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script></script>
    @endsection

    @push('styles')
        <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
    @endpush
