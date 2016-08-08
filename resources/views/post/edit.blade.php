@extends('layouts.site')

@section('title', '| Editar Post')

@section('stylesheets')
  {!! Html::style('css/select2.min.css') !!}
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea', menubar:false , plugins: "link image code textcolor colorpicker preview",
  toolbar: "image | styleselect | bold italic | forecolor backcolor | link | alignjustify alignleft aligncenter alignright | bullist numlist | outdent indent | preview | code",
  relative_urls: false,
  remove_script_host: false,
  image_dimensions: true,
  image_list: [
    @foreach($medias as $media)
    {title: "{{ $media->title }}", value: "{{ $uri . 'uploads/media/'. $media->media }}"},
    @endforeach
  ],
  style_formats: [
  {title: 'Image Left', selector: 'img', styles: {
    'float' : 'left',
    'margin': '0 10px 0 10px'
  }},
  {title: 'Image Right', selector: 'img', styles: {
    'float' : 'right',
    'margin': '0 10px 0 10px'
  }}
  ],
  link_list: [
    @foreach($posts as $postToLink)
    {title: "{{ $postToLink->title }}", value: "{{ $uri . ($postToLink->type=='post' ? 'blog/' : '') . $postToLink->slug }}"},
    @endforeach
  ]
  });
 </script>
@endsection

@section('content')
  <div class="row">
      <div class="col-md-12">
          <h3>Editar entrada</h3>
      </div>
  </div>

      <div class="row">
        {!! Form::model($post, array('route' => array('post.update', $post->id), 'method' => 'PUT')) !!}
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
                      {{ Form::select('img', $medias->lists('title', 'media'), null, ['class' => 'form-control', 'placeholder' => 'Selecciona una imagen']) }}
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
