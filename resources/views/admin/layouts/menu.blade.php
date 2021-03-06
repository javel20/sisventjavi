@if(!(Auth::guest()))

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
            
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu tree">
    <li class="header"></li>
    
  @foreach(session("accesos") as $acceso)
    @if($acceso->pivot->acceso_id==11)

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Local</span>
          <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('locals.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('locals.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif


    @if($acceso->pivot->acceso_id==10) 


    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Tipo Trabajador</span>
          <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('tipotrabajador.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('tipotrabajador.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==8)
    <li class="treeview">
    <a href="#">
      <i class="fa fa-folder"></i>
      <span>Usuarios</span>
       <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
      <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
    </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==9)


    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Licencias</span>
          <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('licencias.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('licencias.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==8)

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Acceso</span>
          <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('accesos.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('accesos.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==7)

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Clientes</span>
          <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('clientes.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('clientes.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==5)


    <li class="treeview">
      <a href="#">
        <i class="fa fa-shopping-cart"></i>
        <span>Ventas</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('ventas.create') }}"><i class="fa fa-circle-o"></i>Crear</a></li>
        <li><a href="{{ route('ventas.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==6)

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Proveedores</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('proveedor.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('proveedor.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==4)


    
    <li class="treeview">
      <a href="#">
        <i class="fa fa-shopping-cart"></i>
        <span>Compras</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('compras.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('compras.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==1)


    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Categoria de productos</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('categorias.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('categorias.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==2)

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Productos</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('productos.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('productos.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>
    @endif

    @if($acceso->pivot->acceso_id==3)

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Stock-Presentacion</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('stockpresent.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('stockpresent.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>

               
    @endif

    @endforeach



    <li>
      <a href="#">
        <i class="fa fa-plus-square"></i> <span>Ayuda</span>
        <small class="label pull-right bg-red">PDF</small>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
        <small class="label pull-right bg-yellow">IT</small>
      </a>
    </li>

                
  </ul>
</section>
<!-- /.sidebar -->
</aside>




@endif