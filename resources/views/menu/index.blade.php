@extends('layouts.site')
@section('title', '| Menus')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Menu
              </h3>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      <div class="row">
          <div class="col-md-12">
              <hr>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      <div class="row">
          <div class="col-md-4">
            <h4>Anadir nuevo item</h4>
            <br>

            {!! Form::open(array('route' => 'menu.store')) !!}
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Entradas</h3>
              </div>
              <div class="panel-body">
                @foreach($posts as $post)
                  <small>
                  {{ Form::checkbox('post[]', $post->id) }}
                  {{ $post->title }}
                  <br>
                  </small>
                @endforeach
                <hr>
                <div class="text-right">{{ Form::submit('Anadir al menu', ['class' => 'btn btn-sm btn-default'])}}</div>
              </div>
            </div>
            {!! Form::close() !!}

            {!! Form::open(array('route' => 'menu.store')) !!}
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Paginas</h3>
              </div>
              <div class="panel-body">
                @foreach($pages as $post)
                  <small>
                  {{ Form::checkbox('post[]', $post->id) }}
                  {{ $post->title }}
                  <br>
                  </small>
                @endforeach</small>
                <hr>
                <div class="text-right">{{ Form::submit('Anadir al menu', ['class' => 'btn btn-sm btn-default'])}}</div>
              </div>
            </div>
            {!! Form::close() !!}

            {!! Form::open(array('route' => 'menu.store')) !!}
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Enlaces personalizados</h3>
              </div>
              <div class="panel-body">
                <span class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::label('Nombre') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'El nombre es cómo aparecerá en tu sitio.')) }}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </span>

                <span class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                {{ Form::label('Slug') }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'El “slug” es la versión amigable de la URL.')) }}
                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
                </span>

                <hr>
                <div class="text-right">{{ Form::submit('Anadir al menu', ['class' => 'btn btn-sm btn-default'])}}</div>
              </div>
            </div>
            {!! Form::close() !!}

          </div><!-- .col-md-4 -->

          <div class="col-md-8">
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Slug</th>
                  </thead>
                  @foreach($menus as $menu)
                  <tbody>
                      <td>{{ $menu->position }}</td>
                      <td><a href="{{ route('menu.edit', $menu->id) }}" ><strong>{{ $menu->name }}</strong></a>
                      <span class="help-block">
                          {!! Form::open(array('route' => ['menu.destroy', $menu->id], 'method' => 'DELETE', 'id' => $menu->id)) !!}
                          <small>
                            <a href="{{ route('menu.edit', $menu->id) }}">Editar</a>
                          | <a class="text-danger" href="#" onclick="document.getElementById({{$menu->id}}).submit();">Borrar</a>
                          </small>
                          {!! Form::close() !!}
                      </span>
                      </td>
                      <td>{{ $menu->slug }}</td>
                  </tbody>
                  @endforeach
              </table><!-- .table -->
              <div class="text-center">{!! $menus->links() !!}</div>
            </div><!-- .table-responsive -->
          </div><!-- .col-md-8 -->
      </div><!-- .row -->
@endsection
