<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu De Navegacion</li>

    <li>
      <a href="{{ route("home") }}">
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
        <li><a href="{{ route("Propietario.index") }}"><i class="fa fa-play"></i> Tabla de registro</a></li>
        <li><a href="{{ route("Propietario.create") }}"><i class="fa fa-play"></i> Crear</a></li> 
      </ul>
    </li> 
  </ul>