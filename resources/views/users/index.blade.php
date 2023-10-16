@extends('layouts.admin')

@section('titulo')
    <span>Nuevo usuario</span>

    <a href="{{ route('users.create')}}" class="btn btn-primary btn-circle">
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
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                              
                                <td>
                                    <a href="{{route('users.show',$user->id )}}" class="btn btn-info"> <i class="fas fa-user"></i></a>
 
                                    <a href="{{route('users.edit',$user->id )}}" class="btn btn-success"> <i class="fas fa-edit"></i></a>
 
                                    <form action="{{route('users.destroy',$user->id )}}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger" type="submit" rel="tooltip">
                                     <i i class="fas fa-trash" ></i>
                                 </button>
                                 </form>
                                
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


@endpush
