@if(!(Auth::guest()))


<div class="">
    <div class="col-sm-3 col-md-2">
		<div class="sidebar-nav menucontorno">
  <div class="navbar navbar-default" role="navigation">

  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <span class="visible-xs navbar-brand">Control Panel</span>
    </div>

<br>
    <div class="navbar-collapse collapse sidebar-navbar-collapse">
      <ul class="nav navbar-nav" id="sidenav01">
        <li class="active menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed menu">
            <h4> Control Panel</h4>
          </a>
         
        </li>
 
       <li class="menu"> 
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Categoria <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
            
              <li><a class="menua" href="{{ asset('/admin/categorias/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ asset('/admin/categorias') }}">Listado</a></li>
              
            </ul>
          </div>
        </li>


        <li class="menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Habitaciones <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo2" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a class="menua" href="{{ url('/habitacions/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ url('/habitacions') }}">Listado</a></li>
              
            </ul>
          </div>
        </li>


        <li class="menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo3" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Hospedaje <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo3" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a class="menua" href="{{ url('/hospedajes/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ url('/hospedajes') }}">Listado</a></li>
              
            </ul>
          </div>
        </li>


        <li class="menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo4" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-plane"></span> Licencia <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo4" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a class="menua" href="{{ url('/licencias/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ url('/licencias') }}">Listado</a></li>
              
            </ul>
          </div>
        </li>


        <li class="menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo5" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Locales <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo5" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a class="menua" href="{{ url('/locals/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ url('/locals') }}">Listado</a></li>
              
            </ul>
          </div>
        </li>


        <li class="menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo6" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Tipo Habitaciones <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo6" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a class="menua" href="{{ url('/tipohabitacions/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ url('/tipohabitacions') }}">Listado</a></li>
              
            </ul>
          </div>
        </li>



        <li class="menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo7" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-tags"></span> Tipo Trabajadores <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo7" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a class="menua" href="{{ url('/tipotrabajadors/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ url('/tipotrabajadors') }}">Listado</a></li>
              
            </ul>
          </div>
        </li>


        <li class="menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo8" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-tags"></span> Trabajadores <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo8" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a class="menua" href="{{ url('/trabajadors/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ url('/trabajadors') }}">Listado</a></li>
            </ul>
          </div>
        </li>


        <li class="menu">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo9" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-tags"></span> Usuarios <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo9" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a class="menua" href="{{ url('/users/create') }}">Crear</a></li>
              <li><a class="menua" href="{{ url('/users') }}">Listado</a></li>
              
            </ul>
          </div>
        </li>



        

        <!--<li class="active"><a href=""><span class="glyphicon glyphicon-cog"></span> Administrador</a></li>-->
      </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
	</div>


@endif