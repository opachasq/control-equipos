@extends('layouts.admin')

@section('titulo')
    <span>Gestión de Operacion</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('operaciones.index') }}">index</a></li>
        <li class="breadcrumb-item active">Gesttión de Operacion</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title">Datos de Operacion</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('operacion.buscar') }}" method="get">
                                <div class=" col-lg-4 form-row tex">
                                    <div class="col-sm-8">

                                        <input id="dni" type="text" maxlength="8"
                                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                            class="form-control form-control-user @error('dni')
is-invalid
@enderror"
                                            name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus
                                            placeholder="ingrese su N° Dni">

                                        @error('dni')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @if (session('errarendatario'))
                                            <div class="notification is-{{ session('errarendatario') }}">
                                                <h5 style="color: red; font-size: 15px">{{ session('errarendatario') }}</h5>
                                                <a href="{{ route('locadores.create') }}" class="btn btn-success mr-1"> <i
                                                        class="fa fa-plus-square"></i> Nuevo Equipo</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form action="{{ route('operaciones.store') }}" method="post" class="form-horizontal">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <input type="hidden" class="form-control" name="id"
                                                value="{{ old('id') }}">
                                            <label class="text-sm" for="tipocontrato_id">Dni </label>
                                            <input id="dni" type="text"
                                                class="form-control form-control-user @error('dni') is-invalid @enderror"
                                                name="dni" value="{{ old('dni') }}" required autocomplete="dni"
                                                autofocus placeholder="dni" readonly>

                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <label class="text-sm" for="nombres">Nombres: </label>
                                            <input id="nombres" type="text"
                                                class="form-control form-control-user @error('nombres') is-invalid @enderror"
                                                name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres"
                                                autofocus placeholder="nombres" readonly>

                                            @error('nombres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <label class="text-sm" for="apellidos"> Apellidos: </label>

                                            <input id="apellidos" type="text"
                                                class="form-control form-control-user @error('apellidos') is-invalid @enderror"
                                                name="apellidos" value="{{ old('apellidos') }}" required
                                                autocomplete="apellidos" autofocus placeholder="apellidos" readonly>

                                            @error('apellidos')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Fecha Devolución: </label>
                                            <input id="fecha" type="date"
                                                class="form-control form-control-user @error('fecha') is-invalid @enderror"
                                                name="fecha" value="{{ old('fecha') }}" required
                                                autocomplete="fecha" autofocus placeholder="Dni">

                                            @error('fecha')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <div class="buttons-form-submit d-flex justify-content-center">

                                <a href="#" class="btn btn-success mr-1"> Volver</a>
                                <a href="{{route('operaciones.create')}}" class="btn btn-warning mr-1"> Cancelar</a>
                                <button type="submit" href="#" class="btn btn-primary">
                                    Guardar
                                </button>
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
