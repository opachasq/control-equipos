@extends('layouts.admin')

@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuarios</h4>
                                <p class="card-category">Vista detallada de usuario {{ $user->name }}</p>
                            </div>
                            <div class="row">
                                                
                              <div class="col-md-12">
                                <div class="card card-user">
                                  <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                      <tbody>
                                        <tr>
                                          <div class="text-center">
                                            <img src="{{ asset('/img/av1.png') }}" alt="image" class="avatar"><br><br>
                                          </div>
                                          <th>ID</th>
                                          <td>{{ $user->id }}
                                          </td>
                                        </tr>
                                        <tr>
                                          <th>Name</th>
                                          <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                          <th>Email</th>
                                          <td><span class="badge badge-primary">{{ $user->email }}</span></td>
                                        </tr>
                                        <tr>
                                          <th>Username</th>
                                          <td>{!! $user->username !!}</td>
                                        </tr>
                                        <tr>
                                          <th>Created at</th>
                                          <td><a href="#" target="_blank">{{  $user->created_at  }}</a></td>
                                        </tr>
                                      
                                      </tbody>
                                    </table>
                                  </div>
                                  <div class="card-footer">
                                    <div class="button-container">
                                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                                      <a href="#" class="btn btn-sm btn-twitter"> Editar </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                  
                              </div>

                        </div>
                  
                </div>
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


   

   
@endpush
