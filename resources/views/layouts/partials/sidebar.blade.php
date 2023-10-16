 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: -webkit-linear-gradient(100deg, #26A0DA, #314755);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-0">
            <img src="img/crepa_icono.png" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">CREPA<sup>Studios</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link text-center" href="{{ route('home') }}">
            <i class="fas fa-home"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Configuración
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Administración</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('users.index') }}"> <i class="fas fa-users fa-fw"></i>
                    Usuarios</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Mantenimientos
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemantenimiento"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Mantenimiento</span>
        </a>
        <div id="collapsemantenimiento" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('categorias.index') }}"> <i class="fas fa-users fa-fw"></i>
                    Categorias</a>
             
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('marcas.index') }}"> <i class="fas fa-users fa-fw"></i>
                    Marcas</a>
             
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('areas.index') }}"> <i class="fas fa-users fa-fw"></i>
                    Oficinas</a>
             
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('modelos.index') }}"> <i class="fas fa-users fa-fw"></i>
                    Modelos</a>
             
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('colores.index') }}"> <i class="fas fa-users fa-fw"></i>
                    Colores</a>
             
            </div>
        </div>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}"> 
            <i class="fas fa-fw fa-table"></i>
            <span>Equipos</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('index1')}}"> 
            <i class="fas fa-fw fa-table"></i>
            <span>Equipos Dado de Baja</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('locadores.index')}}"> 
            <i class="fas fa-fw fa-table"></i>
            <span>Locadores</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('operaciones.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Operaciones</span></a>
    </li>
    
    <div class="sidebar-heading">
        Reportes
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereporte"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Reportes</span>
        </a>
        <div id="collapsereporte" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('reporte_dia') }}"> <i class="fas fa-users fa-fw"></i>
                    Reporte por dia</a>
             
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('reporte_fecha') }}"> <i class="fas fa-users fa-fw"></i>
                    Reporte por fechas</a>
             
            </div>
          
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->