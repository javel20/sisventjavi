@if(!(Auth::guest()))

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
            
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu tree">
    <li class="header"></li>
    

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


    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Trabajador</span>
          <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('trabajadors.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ route('trabajadors.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>


    <li class="treeview">
    <a href="#">
      <i class="fa fa-folder"></i>
      <span>Usuarios</span>
       <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ asset('admin/users/create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
      <li><a href="{{ asset('admin/users') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
    </ul>
    </li>


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


    <li class="treeview">
      <a href="#">
        <i class="fa fa-shopping-cart"></i>
        <span>Ventas</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ asset('admin/categorias/create') }}"><i class="fa fa-circle-o"></i>Crear</a></li>
        <li><a href="{{ asset('admin/categorias') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Proveedores</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ asset('admin/proveedors/create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ asset('admin/proveedors') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>


    
    <li class="treeview">
      <a href="#">
        <i class="fa fa-shopping-cart"></i>
        <span>Compras</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ asset('admin/compras/create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ asset('admin/compras') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>


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

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Productos</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ asset('admin/productos/create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ asset('admin/productos') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Stock-Presentacion</span>
         <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ asset('admin/stock-present/create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>
        <li><a href="{{ asset('admin/stock-present') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
      </ul>
    </li>

               
    




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