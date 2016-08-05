@extends('layouts.admin')

@section('title', '| Nuevo post')

@section('stylesheets')
  {!! Html::style('css/select2.min.css') !!}
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea', menubar:false , plugins: "link image code",
   toolbar: " styleselect | bold italic | link image | alignjustify alignleft aligncenter alignright | bullist numlist | outdent indent | charmap code",
   image_list: [
     @foreach($medias as $media)
     {title: "{{ $media->title }}", value: "{{ url('/uploads/media/'. $media->media) }}"},
     @endforeach
    ]

  });</script>
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
                  <div class="input-group">
                    <span class="input-group-btn">
                      <label class="btn btn-default btn-file">
                        Seleccionar
                        {{ Form::file('img', ['style' => 'display: none;']) }}
                      </label>
                    </span>
                    <input type="text" readonly class="form-control" placeholder="...">
                  </div><!-- /input-group -->
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

  <script>
  $(function() {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
       input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
    });

  });
  </script>

<script>
  function newImagen(url,ancho,alto) {
    var posicion_x;
    var posicion_y;
    posicion_x=(screen.width/2)-(ancho/2);
    posicion_y=(screen.height/2)-(alto/2);
    window.open(url, "leonpurpura.com", "width="+ancho+",height="+alto+",titlebar=0,menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
  }
</script>
@endsection
