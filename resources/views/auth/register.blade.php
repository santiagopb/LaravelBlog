@extends('layouts.app')

@section('content')
<div id="page-full">
    <div class="row" style="padding-top:40px;">
        <h1 class="text-center blank shadow">CronTI | Registro de Usuario</h1>
        <div class="col-md-8 col-md-offset-2">
            <div class="well">
                <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <img src="{{ URL::asset('uploads/avatars/default.jpg') }}" style="width:150px; height:150px; float:right; border-radius:50%; margin-right:25px;">
                </div>

                <div class="col-md-7">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" placeholder="Nombre">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Correo electronico">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Clave">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" placeholder="Confirme su clave">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block btn-cr">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                        </div>

                    </form>

                  </div>
                </div>
              </div>

        </div>
    </div>
</div>
@endsection
