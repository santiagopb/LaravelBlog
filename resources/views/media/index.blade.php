@extends('layouts.admin')

@section('title', '| Medios')

@section('content')
  <div class="row">
      <div class="col-md-12">
          <h3>Galeria de medios</h3>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <hr>
      </div>
  </div>

  <br>

        <div class="row">
            <div class="col-md-6">
                {!! Form::open(['route' => 'media.store', 'method' => 'POST', 'files' => 'true']) !!}
                    <div class="input-group">
                      <span class="input-group-btn">
                        <label class="btn btn-default btn-file">
                          +
                          {{ Form::file('media', ['style' => 'display: none;']) }}
                        </label>
                      </span>
                      <input type="text" id="title" name="title" readonly class="form-control" placeholder="...">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </span>
                    </div><!-- /input-group -->
                {!! Form::close() !!}
            </div><!-- .col-md-6 -->
            <div class="col-md-6"></div><!-- .col-md-6 -->
        </div><!-- .row -->

  <br>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listado
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($medias as $media)
                            {!! Form::open(array('route' => ['media.destroy', $media->id], 'method' => 'DELETE', 'id' => $media->id)) !!}
                            <div class="col-sm-6 col-md-4">
                                <a class="btn btn-danger pull-right" href="#" onclick="document.getElementById({{$media->id}}).submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <div class="thumbnail">
                                    <img src="{{ URL::asset('uploads/media/'.$media->media) }}" alt="{{$media->title}}">
                                    <div class="caption">


                                        <h4>{{$media->title}}

                                        </h4>

                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

            input.prop('readonly', false);

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
