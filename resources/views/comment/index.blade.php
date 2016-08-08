@extends('layouts.site')
@section('title', '| Todos los Comentarios')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Comentarios
              </h3>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <th>#</th>
                      <th>Autor</th>
                      <th>Comentario</th>
                      <th>En respuesta a</th>
                      <th>Enviado el</th>
                  </thead>
                  @foreach($comments as $comment)
                  <tbody>
                      <td>{{ $comment->id }}</td>
                      <td>{{ $comment->author_name }}</td>
                      <td><a href="{{ route('comment.edit', $comment->id) }}" ><strong>{{ $comment->comment }}</strong></a>
                      <span class="help-block">
                          <small>
                            <a href="{{ route('comment.edit', $comment->id) }}">Editar</a>
                          | <a href="{{ route('comment.show', $comment->id) }}">Ver</a>
                        </small>
                      </span>
                      </td>

                      <td>{{ ($comment->parent>0) ? $comment->reply->author_name.' por: '.$comment->reply->comment : $comment->post->title }}</td>
                      <td><small>Publicada <br> {{ date('j/m/Y', strtotime($comment->created_at)) }}</small></td>
                  </tbody>
                  @endforeach
              </table><!-- .table -->
              <div class="text-center">{!! $comments->links() !!}</div>
            </div><!-- .table-responsive -->
          </div><!-- .col-md-10 -->
      </div><!-- .row -->
@endsection
