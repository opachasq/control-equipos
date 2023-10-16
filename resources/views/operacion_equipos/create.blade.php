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
                                    <div class="col-lg-3 ">
                                        <div>
                                            <input type="hidden" class="form-control" name="operacion_id" value="{{ $operaciones->id }}">
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
                                    <div class="col-lg-6">
                                        &nbsp; 
                                        <div class="buttons-form-submit d-flex justify-content-center">
                
                                            <button type="submit" href="#" class="btn btn-primary">
                                                Agregar
                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{route('operaciones.index')}}" class="btn btn-success mr-1"> Volver</a>
                                            
                                        </div>
                                    </div>
                                   
                                </div>
                        </div>
                        <div>
                          @include('operacion_equipos.index')
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
