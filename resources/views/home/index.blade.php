@extends('layouts.admin')

{{-- @section('titulo','Mantenimiento Principal:') --}}
    
@section('contenido')
<h3 style="color: black">Mantenimiento Principal:</h3>
    <div class="row">
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" >
                <div class="card-body">
                    <div class="row no-gutters align-items-center" >
                        <div class="col mr-2">
                            
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                MODELOS</div>
                                <a href="{{ route('modelos.index') }}" class="nav-link font-weight-bold text-primary" style="font-size: 20px;"> MODELOS</a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-barcode fa-2x text-gray-300"></i>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                COLORES</div>
                                <a href="{{ route('colores.index') }}" class="nav-link font-weight-bold text-success text-uppercase mb-1" style="font-size: 20px"> COLORES</a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">MARCAS
                            </div>
                            <a href="{{ route('marcas.index') }}" class="nav-link font-weight-bold text-info text-uppercase mb-1 " style="font-size: 20px"> MARCAS</a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-server fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                CATEGORIAS</div>
                                <a href="{{ route('categorias.index') }}" class="nav-link font-weight-bold text-warning text-uppercase mb-1" style="font-size: 20px"> CATEGORIAS</a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-tasks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                OFICINAS</div>
                                <a href="{{ route('areas.index') }}" class="nav-link font-weight-bold text-danger text-uppercase mb-1" style="font-size: 20px"> OFICINAS</a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-university fa-2x text-gray-300"></i>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                LOCADORES</div>
                                <a href="{{route('locadores.index')}}" class="nav-link font-weight-bold text-secondary text-uppercase mb-1" style="font-size: 20px"> LOCADORES</a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <h3 style="color: black">Registro y Control de Equipos:</h3>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
           <div class="card border-left-primary shadow h-100 py-2" >
               <div class="card-body">
                   <div class="row no-gutters align-items-center" >
                       <div class="col mr-2">
                           
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               GESTIÓN DE EQUIPOS</div>
                               <a href="{{route('equipos.index')}}" class="nav-link font-weight-bold" style="font-size: 20px;"> GESTIÓN DE EQUIPOS</a>
                       </div>
                       <div class="col-auto">
                           <i class="fa fa-table fa-2x text-gray-300"></i>
                       </div>
                       
                       
                   </div>
               </div>
           </div>
       </div>

       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-4 col-md-6 mb-4">
           <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                   <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               GESTIÓN DE OPERACIONES</div>
                               <a href="{{route('operaciones.index')}}" class=" nav-link text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 20px"> GESTIÓN DE OPERACIONES</a>
                       </div>
                       <div class="col-auto">
                           <i class="fa fa-cog fa-2x text-gray-300"></i>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Earnings (Monthly) Card Example -->
     
       <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            EQUIPOS DADO DE BAJA</div>
                            <a href="{{route('index1')}}" class=" nav-link text-xs font-weight-bold text-danger text-uppercase mb-1" style="font-size: 20px"> EQUIPOS DE DADO BAJA</a>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-server fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <!-- Pending Requests Card Example -->
    
   </div>
@endsection