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

      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              {!! Form::open(array('route' => 'post.store')) !!}

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

                  <br>

                  <span class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                  {{ Form::select('category_id', $categories->lists('name', 'id'), null, ['class' => 'form-control']) }}
                  @if ($errors->has('category_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('category_id') }}</strong>
                      </span>
                  @endif
                  </span>

                  <br>

                  <span class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                  {{ Form::select('tags[]', $tags->lists('name', 'id'), null, ['class' => 'form-control select2', 'multiple' => 'multiple']) }}
                  @if ($errors->has('tags'))
                      <span class="help-block">
                          <strong>{{ $errors->first('tags') }}</strong>
                      </span>
                  @endif
                  </span>

                  <br>

                  {{ Form::submit('Publicar', array('class' => 'btn btn-primary btn-sm')) }}

              {!! Form::close() !!}
          </div><!-- .col-md-9 -->
      </div class="row"><!-- .row -->

      <div class="row">
          <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-body">
                    <strong>Creado:</strong>Sin Publicar
                    <strong>Actualizado:</strong> -
                </div>
                <div class="panel-footer">

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Categorias</div>
                <div class="panel-body">
                    <strong>Creado:</strong>Sin Publicar
                    <strong>Actualizado:</strong> -
                </div>
                <div class="panel-body">
                    <strong>Creado:</strong>Sin Publicar
                    <strong>Actualizado:</strong> -
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Etiquetas</div>
                <div class="panel-body">
                    <strong>Creado:</strong>Sin Publicar
                    <strong>Actualizado:</strong> -
                </div>
                <div class="panel-body">
                    <strong>Creado:</strong>Sin Publicar
                    <strong>Actualizado:</strong> -
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Imagen destacada</div>
                <div class="panel-body">
                    <strong>Creado:</strong>Sin Publicar
                    <strong>Actualizado:</strong> -
                </div>
                <div class="panel-body">
                    <strong>Creado:</strong>Sin Publicar
                    <strong>Actualizado:</strong> -
                </div>
            </div>

          </div><!-- .col-md-3 -->
      </div><!-- .row -->
@endsection

@section('scripts')
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    $(document).ready(function() {
      $(".select2").select2();
    });
  </script>
@endsection
