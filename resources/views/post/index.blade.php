@extends('layouts.admin')
@section('title', '| Todos los Post')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Entradas
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">Anadir nueva</a>
              </h3>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <th>Titulo</th>
                      <th>Autor</th>
                      <th>Categoria</th>
                      <th>Etiquetas</th>
                      <th>Fecha</th>
                  </thead>
                  @foreach($posts as $post)
                  <tbody>
                      <td><a href="{{ route('post.edit', $post->id) }}" ><strong>{{ $post->title }}</strong></a>
                      <span class="help-block">
                          <small>
                            <a href="{{ route('post.edit', $post->id) }}">Editar</a>
                          | <a href="{{ route('post.show', $post->id) }}">Ver</a>
                        </small>
                      </span>
                      </td>
                      <td>{{ $post->user->name }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>
                        @foreach($post->tags as $tag)
                          <span class="label label-default">{{ $tag->name }}</span>
                        @endforeach
                      </td>
                      <td><small>Publicada <br> {{ date('j/m/Y', strtotime($post->created_at)) }}</small></td>
                  </tbody>
                  @endforeach
              </table><!-- .table -->
              <div class="text-center">{!! $posts->links() !!}</div>
            </div><!-- .table-responsive -->
          </div><!-- .col-md-10 -->
      </div><!-- .row -->
@endsection
