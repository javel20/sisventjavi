<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">
    <!--asset para decir que viene como referencia a un hipervinculo de public-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@if(auth::check())
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AD</b>V</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Almacen - Ventas</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Navegación</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<small class="bg-red">Online</small>-->
              <span class="hidden-xs">{{ Auth::user()->email }}</span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a style="background:blue" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
    
</ul>
</div>

</nav>
</header>


@include('admin.layouts.menu')


<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        @endif
    
    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sistema de Ventas</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                          @yield('content')
                              <!--Fin Contenido-->
                       </div>
                    </div>
                        
                      </div>
                  </div><!-- /.row -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<center>
  <footer class="footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2015-2020</strong> All rights reserved.
</footer>
</center>

    <!-- Scripts -->
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>


    @yield('js')
</body>
</html>
