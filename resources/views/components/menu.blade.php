<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu De Navegacion</li>

    <li>
        <a href="{{ route('home') }}">
            <i class="fa fa-home"></i> <span>Home</span>
        </a>
    </li>

    <li class="active treeview menu-open">
        <a href="#">
            <i class="fa fa-users"></i> <span>Propietarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('Propietario.index') }}"><i class="fa fa-play"></i> Tabla de registro</a></li>
            <li><a href="{{ route('Propietario.create') }}"><i class="fa fa-play"></i> Crear</a></li>
        </ul>
    </li>

    @if (Auth::user()->tipo == 'A')
        <li>
            <a href="{{ route('Usuario.index') }}">
                <i class="fa fa-users-cog"></i> <span>Usuarios</span>
            </a>
        </li>
        <li>
            <a href="{{ route('clase.index') }}">
                <i class="fa fa-car-alt"></i> <span>Clase vehicular</span>
            </a>
        </li>

        <li>
            <a href="{{ route('Reporte.padronSunat') }}">
                <i class="fa-solid fa-file-excel"></i> <span>Padron Sunat</span>
            </a>
        </li>

        <li>
            <a href="{{ route('Reporte.padronSbs') }}">
                <i class="fa-solid fa-file-excel"></i> <span>Padron Sbs</span>
            </a>
        </li>



        <li>
            <a href="{{ route('Reporte.dbSiniestros') }}">
                <i class="fa-solid fa-file-excel"></i> <span>Db Siniestros</span>
            </a>
        </li>

        <li>
            <a href="{{ route('Reporte.resumenTotal') }}">
                <i class="fa-solid fa-file-excel"></i> <span>Resumen Total</span>
            </a>
        </li>
    @endif


</ul>
