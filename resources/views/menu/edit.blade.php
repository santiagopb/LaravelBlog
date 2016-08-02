@extends('layouts.admin')
@section('title', '| Editar menu')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Editar item
              </h3><br>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      {!! Form::model($menu, array('route' => ['menu.update', $menu->id], 'method' => 'PUT')) !!}
      <div class="row">
          <div class="col-md-2">
              <label for="name">Nombre  </label>
          </div>
          <div class="col-md-8">

                <span class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                        <small>El nombre es cómo aparecerá en tu sitio.</small>
                    </span>
                @endif
                </span>

          </div>
      </div><!-- .row -->
      <br>
      <div class="row">
          <div class="col-md-2">
              <label for="name">Slug  </label>
          </div>
          <div class="col-md-8">

                <span class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                {{ Form::text('slug', null, array('class' => 'form-control')) }}
                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                        <small>El “slug” es la versión amigable de la URL del nombre. Suele estar en minúsculas y contiene sólo letras, números y guiones.</small>
                    </span>
                @endif
                </span>

          </div>
      </div><!-- .row -->
      <br>
      <div class="row">
          <div class="col-md-2">
              <label for="name">Posicion </label>
          </div>
          <div class="col-md-8">

                <span class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                {{ Form::text('position', null, array('class' => 'form-control')) }}
                @if ($errors->has('position'))
                    <span class="help-block">
                        <strong>{{ $errors->first('position') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                        <small>La posicion en la que aparecera el item.</small>
                    </span>
                @endif
                </span>

          </div>
      </div><!-- .row -->
      <br>
      
      {{ Form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary'])}}
      {!! Form::close() !!}
@endsection
