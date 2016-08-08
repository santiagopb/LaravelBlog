@extends('layouts.site')
@section('title', '| Todos las Paginas')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Paginas
                <a href="{{ route('page.create') }}" class="btn btn-sm btn-primary">Anadir nueva</a>
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
                      <th>Fecha</th>
                  </thead>
                  @foreach($pages as $page)
                  <tbody>
                      <td><a href="{{ route('post.edit', $page->id) }}" ><strong>{{ $page->title }}</strong></a>
                      <span class="help-block">
                          {!! Form::open(array('route' => ['page.destroy', $page->id], 'method' => 'DELETE', 'id' => $page->id)) !!}
                          <small>
                            <a href="{{ route('page.edit', $page->id) }}">Editar</a>
                          | <a href="{{ route('page.show', $page->id) }}">Ver</a>
                          | <a class="text-danger" href="#" onclick="document.getElementById({{$page->id}}).submit();">Borrar</a>
                        </small>
                        {!! Form::close() !!}
                      </span>
                      </td>
                      <td>{{ $page->user->name }}</td>
                      <td><small>Publicada <br> {{ date('j/m/Y', strtotime($page->created_at)) }}</small></td>
                  </tbody>
                  @endforeach
              </table><!-- .table -->
              <div class="text-center">{!! $pages->links() !!}</div>
            </div><!-- .table-responsive -->
          </div><!-- .col-md-10 -->
      </div><!-- .row -->
@endsection
