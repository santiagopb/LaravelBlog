@extends('layouts.site')
@section('title', '| Editar etiqueta')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Editar etiqueta
              </h3><br>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      {!! Form::model($tag, array('route' => ['tag.update', $tag->id], 'method' => 'PUT')) !!}
      <div class="row">

          <div class="col-md-2">
              <label for="name">Nombre  </label>
          </div>

          <div class="col-md-8">
                <span class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'El nombre es cómo aparecerá en tu sitio.')) }}
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
                <br>
                {{ Form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary'])}}
          </div>

      </div><!-- .row -->
      {!! Form::close() !!}
@endsection
