@extends('layouts.admin')

@section('title', '| Nueva pagina')

@section('stylesheets')
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea', menubar:false , plugins: "link" });</script>
@endsection

@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>Anadir pagina</h3>
          </div>
      </div>

      {!! Form::open(array('route' => 'page.store')) !!}
      <div class="row">

          <div class="col-md-8">
                  {{ Form::text('type', 'page', array('class' => 'hidden')) }}

                  <span class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                  {{ Form::text('title', null, array('class' => 'form-control input-lg', 'placeholder' => 'Titulo')) }}
                  @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                  @endif
                  </span>

                  <br>

                  {{ Form::file('image') }}
                  <span class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                  {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                  @if ($errors->has('body'))
                      <span class="help-block">
                          <strong>{{ $errors->first('body') }}</strong>
                      </span>
                  @endif
                  </span>

          </div><!-- .col-md-8 -->

          <div class="col-md-4">

            <div class="well">
                  <dl class="dl-horizontal">
                      <dt>Creado</dt>
                      <dd>Aun sin publicar</dd>
                  </dl>
                  <dl class="dl-horizontal">
                      <dt>Actualizado</dt>
                      <dd>--</dd>
                  </dl>
                  <hr>
                  {{ Form::submit('Publicar', array('class' => 'btn btn-primary btn-sm')) }}
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Imagen destacada</strong></div>
                <div class="panel-body">
                    <strong>Aun sin cerar:</strong>--
                </div>
            </div>

          </div><!-- .col-md-4 -->
      </div><!-- .row -->
      {!! Form::close() !!}
@endsection
