@extends('layouts.admin')

@section('titulo')
    <span>Marca</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')

    @include('marcas.modals.create')


    <div class="card">
        <div class="table-responsive">

            <div class="card-body">
                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marcas as $key => $marca)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $marca->nombre }}</td>
                                <td style="width: 10%" class="text-center text-sm">
                                    @if ($marca->activo == '1')
                                        <span class="badge badge-success">activo</span>
                                    @else
                                        <span class="badge badge-danger">inactivo</span>
                                    @endif
                                </td>
                                <td>

                                    @if ($marca->activo == '1')
                                        <a href="{{ url('Marca/altabaja', [$marca->activo, $marca->id]) }}"><button
                                                type="button" class="btn btn-warning btn-sm"
                                                title="desactivar el estado de marca"><i
                                                    class="fa fa-arrow-circle-down"></i></button></a>
                                    @else
                                        <a href="{{ url('Marca/altabaja', [$marca->activo, $marca->id]) }}"><button
                                                type="button" class="btn btn-dark btn-sm"
                                                title="activar el estado de marca"><i
                                                    class="fa fa-arrow-circle-up"></i></button></a>
                                    @endif
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#editModal{{ $marca->id }}" title="Editar marca">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $marca->id }}" title="eliminar marca">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            @include('marcas.modals.update')
                            @include('marcas.modals.delete')
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
