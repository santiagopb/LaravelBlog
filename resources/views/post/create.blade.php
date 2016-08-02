@extends('layouts.admin')

@section('title', '| Nuevo post')

@section('stylesheets')
  {!! Html::style('css/select2.min.css') !!}
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea', menubar:false , plugins: "link" });</script>
@endsection

@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>Anadir entrada</h3>
          </div>
      </div>

      {!! Form::open(array('route' => 'post.store')) !!}
      <div class="row">

          <div class="col-md-8">
                  {{ Form::text('type', 'post', array('class' => 'hidden')) }}

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
                <div class="panel-heading"><strong>Categoria</strong></div>
                <div class="panel-body">
                  <span class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                  {{ Form::select('category_id', $categories->lists('name', 'id'), null, ['class' => 'form-control']) }}
                  @if ($errors->has('category_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('category_id') }}</strong>
                      </span>
                  @endif
                  </span>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Etiquetas</strong></div>
                <div class="panel-body">
                  <span class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                  {{ Form::select('tags[]', $tags->lists('name', 'id'), null, ['class' => 'form-control select2', 'multiple' => 'multiple']) }}
                  @if ($errors->has('tags'))
                      <span class="help-block">
                          <strong>{{ $errors->first('tags') }}</strong>
                      </span>
                  @endif
                  </span>
                </div>
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

@section('scripts')
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    $(document).ready(function() {
      $(".select2").select2();
    });
  </script>
@endsection
