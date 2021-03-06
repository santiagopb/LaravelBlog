{!! Form::model($comment, array('route' => ['comment.store', $comment->id], 'method' => 'PUT')) !!}

{{ Form::text('post_id', $comment->post_id, array('class' => 'hidden')) }}
{{ Form::text('parent', 0, array('class' => 'hidden')) }}

<span class="form-group{{ $errors->has('author_name') ? ' has-error' : '' }}">
{{ Form::text('author_name', null, array('class' => 'form-control input-lg', 'placeholder' => 'Escribe tu Nombre')) }}
@if ($errors->has('author_name'))
    <span class="help-block">
        <strong>{{ $errors->first('author_name') }}</strong>
    </span>
@endif
<span class="form-group{{ $errors->has('author_email') ? ' has-error' : '' }}">
{{ Form::text('author_email', null, array('class' => 'form-control input-lg', 'placeholder' => 'Correo electronico')) }}
@if ($errors->has('author_email'))
    <span class="help-block">
        <strong>{{ $errors->first('author_email') }}</strong>
    </span>
@endif
<span class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
{{ Form::text('comment', null, array('class' => 'form-control input-lg', 'placeholder' => 'Escribe tu comentario')) }}
@if ($errors->has('comment'))
    <span class="help-block">
        <strong>{{ $errors->first('comment') }}</strong>
    </span>
@endif
{{ Form::submit('Publicar', array('class' => 'btn btn-primary btn-sm')) }}
{!! Form::close() !!}
