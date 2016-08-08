@extends('layouts.site')
@section('title', '| Todas las categorias')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                <img src="{{ URL::asset('uploads/avatars/default.jpg') }}" style="width:62px; height:62px; border-radius:50%; margin-right:15px;">
                Anadir nuevo usuario
              </h3>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      <div class="row">
          <div class="col-md-12">
              <hr>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      {!! Form::open(array('route' => 'user.store', 'enctype' => 'multipart/form-data')) !!}
      <div class="row">
          <div class="col-md-6">

                <span class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::label('Nombre') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'El nombre es cómo aparecerá en tu sitio.')) }}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </span>

                <br>

                <span class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{ Form::label('Email') }}
                {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'El “slug” es la versión amigable de la URL.')) }}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </span>

                <br>

                <span class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{ Form::label('Clave') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </span>

                <br>

                <div class="input-group">
                  <span class="input-group-btn">
                    <label class="btn btn-default btn-file">
                      Avatar
                      {{ Form::file('avatar', ['style' => 'display: none;']) }}
                    </label>
                  </span>
                  <input type="text" readonly class="form-control" placeholder="...">
                </div><!-- /input-group -->

                <br>

          </div><!-- .col-md-6 -->

          <div class="col-md-6">
            {{ Form::label('Roles') }}
            <br>
            @foreach($roles as $role)
              {{ Form::checkbox('roles[]', $role->name) }}
              {{ $role->name }}
              <span class="help-block">
                  <small>&nbsp;&nbsp;&nbsp;&nbsp;({{ $role->description }})</small>
              </span>
            @endforeach
          </div>
      </div><!-- .row -->
      {{ Form::submit('Anadir nuevo usuario', ['class' => 'btn btn-sm btn-primary'])}}
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
