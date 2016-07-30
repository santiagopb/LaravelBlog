@extends('layouts.admin')

@section('title', '| Editar Post')

@section('stylesheets')
  {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
      <div class="row">
        {!! Form::model($post, array('route' => array('post.update', $post->id), 'method' => 'PUT')) !!}
          <div class="col-md-8">
              {{ Form::label('title', 'Titulo') }}
              {{ Form::text('title', null, array('class' => 'form-control input-lg')) }}
              @if ($errors->has('title'))
                  <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif

              <br>

              {{ Form::label('slug', 'Slug') }}
              {{ Form::text('slug', null, array('class' => 'form-control input-sm')) }}
              @if ($errors->has('slug'))
                  <span class="help-block">
                      <strong>{{ $errors->first('slug') }}</strong>
                  </span>
              @endif

              <br>

              {{ Form::label('body', 'Post') }}
              {{ Form::textarea('body', null, array('class' => 'form-control')) }}

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
                  <div class="row">
                      <div class="col-md-6">
                          {!! Html::linkRoute('post.show', 'Cancelar', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                      </div>
                      <div class="col-md-6">
                          {{ Form::submit('Guardar', array('class' => 'btn btn-success btn-block'))}}
                      </div>
                  </div>
              </div>
          </div>
        {!! Form::close() !!}
      </div><!-- .row -->
@endsection

@section('scripts')
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    $(document).ready(function() {
      $(".select2").select2();
      $(".select2").select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
    });
  </script>
@endsection
