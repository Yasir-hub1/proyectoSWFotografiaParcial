<ul class="sidebar-menu sidebar">
@role('organizador')
    <li class="menu-header ">Dashboard</li>
    <li class="dropdown {{ ''  ? ' active' : '' }}">
      <a href="{{ route('home') }}" ><i class="fas fa-home titulo"></i><span class="titulo">Dashboard</span></a> 
    </li>
    
    <li class="menu-header">Administracion</li>
    <li class="dropdown {{  'users' ? ' ' : '' }}">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users titulo"></i> <span class="titulo">Usuarios</span></a>
      <ul class="dropdown-menu ">
        <li  class="nav-item{{  'fotografos' ? ' ' : '' }}"><a   href="{{ route('fotografos.index')}}"  class="nav-link" href="layout-transparent.html">Fotografos Registrados</a></li>
        <li  class="nav-item{{  'clientes' ? ' ' : '' }}"><a  href="{{ route('clientes.index')}}"    class="nav-link" href="layout-transparent.html">Invitados Registrados</a></li>
      </ul>

      <a href="" ><i class="fa fa-user-lock f-left titulo"></i><span class="titulo">Roles</span></a>
    </li>
    @endrole

    @role('organizador')
    <li class="menu-header">Modulos</li>

    @endrole
    
@role('fotografo')
<li class="menu-header ">Dashboard</li>
    <li class="dropdown {{ ''  ? ' active' : '' }}">
      <a href="{{ route('home2') }}" ><i class="fas fa-home titulo"></i><span class="titulo">Dashboard</span></a>
    </li>

    <li class="dropdown  {{  'contratos' ||  'personales' ||  'contratos' ||  'departamentos' ||  'bonos' ||  'descuentos' ||  'horarios' ||  'sanciones' ? ' ' : '' }}">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Albums</span></a>
      <ul class="dropdown-menu">

        <li class="nav-item{{  'departamentos' ? ' ' : '' }}"><a class="nav-link"href="{{route('albums.create')}}" >Subir Foto</a></li>
        <li class="nav-item{{  'contratos' ? ' ' : '' }}"><a class="nav-link "href="{{route('albums.index')}}" >Ver Albums</a></li>


      </ul>
    </li>
    @endrole

    @role('organizador')
    <li class="dropdown  {{  'contratos' ||  'personales' ||  'contratos' ||  'departamentos' ||  'bonos' ||  'descuentos' ||  'horarios' ||  'sanciones' ? ' ' : '' }}">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Eventos</span></a>
      <ul class="dropdown-menu">

        <li class="nav-item{{  'departamentos' ? ' ' : '' }}"><a class="nav-link"href="{{route('eventos.create')}}" >Crear Evento</a></li>
        <li class="nav-item{{  'departamentos' ? ' ' : '' }}"><a class="nav-link"href="{{route('eventos.index')}}" >Ver Evento</a></li>
       <!-- <li class="nav-item{{  'departamentos' ? ' ' : '' }}"><a class="nav-link"href="{{route('eventos.generarCatalogo')}}" >Ver Catalogos</a></li> -->

      </ul>
    </li>
    @endrole
    <style>


    </style>
