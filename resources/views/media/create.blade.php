@extends('layouts.site')

@section('title', '| Agregar medio')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Banner</div>

                <div class="panel-body">

                        {!! Form::open(['route' => 'media.store', 'method' => 'POST', 'files' => 'true']) !!}
                        <div class="form-group">
                            {!! form::label('name','Nombre')!!}
                            {!! form::text('name',null,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! form::label('image','Imagen')!!}
                            {!! form::file('image',null,['class' => 'form-control']) !!}

                        </div>
                        <button type="submit" class="btn btn-default">Guardar Banner</button>
                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

{!! Form::open(['route' => 'media.store', 'method' => 'POST', 'files' => 'true']) !!}
    <div class="input-group">
      <span class="input-group-btn">
        <label class="btn btn-default btn-file">
          Seleccionar
          {{ Form::file('img', ['style' => 'display: none;']) }}
        </label>
      </span>
      <input type="text" readonly class="form-control" placeholder="...">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default">Guardar Banner</button>
      </span>
    </div><!-- /input-group -->
{!! Form::close() !!}
@endsection

@section('scripts')
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
@endsection
