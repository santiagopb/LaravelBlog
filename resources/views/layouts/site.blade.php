<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cronti @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,500,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen:700,400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <!-- Estilos de administrador -->
    <link href="{{ URL::asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/sb-admin-2.css') }}" rel="stylesheet">

    @yield('stylesheets')

    <style>
        body {
            font-family: 'Lato';
            padding-top: 50px;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>


</head>

<body id="app-layout">
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <div class="navbar-header">

              <!-- Collapsed Hamburger -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

              <!-- Branding Image -->
              <a class="navbar-brand" href="{{ url('/') }}">
                  Cron<span class="red">TI</span>
              </a>
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav" id="navbar-phone">
                  <li><a><strong><i class="fa fa-phone" arial-hidden="true"></i> (+34) 652.14.9339</strong></a></li>
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right" id="navbar-right">

                  <!-- Link del menu -->
                  @if(isset($menu))
                  @foreach($menu as $item)
                      <li class="{{ Request::is($item->slug) ? 'active' : '' }}"><a href="{{ url($item->slug) }}">{{ $item->name }}</a></li>
                  @endforeach
                  @endif

                  <!-- Authentication Links -->
                  @if (Auth::guest())
                      <li class="{{ Request::is('/4') ? 'active' : '' }}"><a href="{{ url('/login') }}" alt="Iniciar sesion">Sitio web</a></li>
                  @else
                      <li class="{{ Request::is('/4') ? 'active' : '' }}"><a href="{{ url('/site') }}" alt="Iniciar sesion">Web</a></li>
                      <li class="{{ Request::is('/4') ? 'active' : '' }}"><a href="{{ url('/warehouse') }}" alt="Iniciar sesion">Almacen</a></li>
                      <li class="{{ Request::is('/4') ? 'active' : '' }}"><a href="{{ url('/purchases') }}" alt="Iniciar sesion">Compras</a></li>
                      <li class="{{ Request::is('/4') ? 'active' : '' }}"><a href="{{ url('/sales') }}" alt="Iniciar sesion">Ventas</a></li>
                      <li class="{{ Request::is('/4') ? 'active' : '' }}"><a href="{{ url('/accounting') }}" alt="Iniciar sesion">Contabilidad</a></li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img src="{{ URL::asset('uploads/avatars/'.Auth::user()->avatar) }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%;">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Perfil</a></li>
                              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                          </ul>
                      </li>
                  @endif
              </ul>
          </div>
      </div>
    </nav>


            <div class="navbar-default sidebar" role="navigation" style="float:left;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        @if(Auth::user()->hasRole('Administrador'))
                            @include('layouts.partials._admin_menu')
                        @elseif(Auth::user()->hasRole('Colaborador'))
                            @include('layouts.partials._colab_menu')
                        @endif
                    </ul>
                </div>
            </div>



        <div id="page-wrapper">
          <br>
            @include('alerts._messages')
            @yield('content')
        </div>

    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="{{ URL::asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('js/sb-admin-2.js') }}"></script>
    @yield('scripts')

</body>

</html>
