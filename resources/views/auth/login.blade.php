@extends('layouts.app')

@section('content')
<div id="page-full">
  <div id="vertical-align">
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <h1 class="blank">Bienvenido</h1>
          <p class="blank shadow">El Portal Cronti proporciona acceso a contenido premium y funciones
          avanzadas, diseñado exclusivamente para clientes y partners.
          Como usuario, usted tendrá acceso a contenido personalizado para
          una mejor experiencia.</p>
        </div>
        <div class="col-md-4">
            <div class="well" style="padding:10%;">

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Correo electronico">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                            <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Clave">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                      </div>
                    </div>

                    <p class="text-center">
                          <input type="checkbox" name="remember"> Recuerdame
                    </p>

                    <button type="submit" class="btn btn-block btn-primary btn-lg btn-cr">
                        <i class="fa fa-btn fa-sign-in"></i> Ingresar
                    </button>
                    <p class="text-center"><a class="btn btn-link" href="{{ url('/password/reset') }}">Olvidaste tu clave?</a></p>

                </form>

            </div><!-- .well -->

            <p class="text-center blank"><small> ¿Aun no tienes una cuenta? </small></p>
            <div><a class="btn btn-block btn-primary btn-lg btn-cr" href="{{ url('/register') }}">Cree una.</a></div>

        </div><!-- .col-md-2 -->
    </div><!-- .row -->
  </div><!-- .vertical-align -->
</div><!-- .page-full -->
@endsection
