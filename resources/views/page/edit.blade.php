@extends('layouts.site')

@section('title', '| Editar Pagina')

@section('stylesheets')
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea', menubar:false , plugins: "link" });</script>
@endsection

@section('content')
  <div class="row">
      <div class="col-md-12">
          <h3>Editar pagina</h3>
      </div>
  </div>

      <div class="row">
        {!! Form::model($post, array('route' => array('page.update', $post->id), 'method' => 'PUT')) !!}
          <div class="col-md-8">

              <span class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              {{ Form::text('title', null, array('class' => 'form-control input-lg')) }}
              @if ($errors->has('title'))
                  <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
              </span>

              <br>

              <span class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
              {{ Form::label('slug', 'Slug') }}
              {{ Form::text('slug', null, array('class' => 'form-control input-sm')) }}
              @if ($errors->has('slug'))
                  <span class="help-block">
                      <strong>{{ $errors->first('slug') }}</strong>
                  </span>
              @endif
            </span>

              <br>

              {{ Form::textarea('body', null, array('class' => 'form-control')) }}


          </div><!-- .col-md-8 -->
          <div class="col-md-4">

              <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Creado</dt>
                        <dd>{{ date('j M, Y h:ia', $post->created_at->getTimestamp()) }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Actualizado</dt>
                        <dd>{{ date('j M, Y h:ia',$post->updated_at->getTimestamp()) }}</dd>
                    </dl>
                    <hr>
                    {{ Form::submit('Actualizar', array('class' => 'btn btn-primary btn-sm'))}}
              </div>

              <div class="panel panel-default">
                  <div class="panel-heading"><strong>Imagen destacada</strong></div>
                  <div class="panel-body">
                      <strong>Aun sin cerar:</strong>--
                  </div>
              </div>

          </div>
        {!! Form::close() !!}
      </div><!-- .row -->
@endsection
