@extends('layouts.admin')
@section('title', '| Todas las categorias')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Categorias
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
            <h4>Anadir nueva categoria</h4>
            <br>
            {!! Form::open(array('route' => 'category.store')) !!}

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

                <span class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                {{ Form::label('Slug') }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'El “slug” es la versión amigable de la URL.')) }}
                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
                </span>

                <br>

                <span class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                {{ Form::label('Descripcion') }}
                {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'La descripción no suele mostrarse por defecto, sin embargo hay algunos temas que puede que la muestren.')) }}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
                </span>

                <br>

                {{ Form::submit('Anadir nueva categoria', ['class' => 'btn btn-sm btn-primary'])}}
            {!! Form::close() !!}
          </div>

          <div class="col-md-8">
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Slug</th>
                  </thead>
                  @foreach($categories as $category)
                  <tbody>
                      <td><a href="{{ route('category.edit', $category->id) }}" ><strong>{{ $category->name }}</strong></a>
                      <span class="help-block">
                          {!! Form::open(array('route' => ['category.destroy', $category->id], 'method' => 'DELETE', 'id' => $category->id)) !!}
                          <small>
                            <a href="{{ route('category.edit', $category->id) }}">Editar</a>
                          | <a href="{{ route('category.show', $category->id) }}">Ver</a>
                          | <a class="text-danger" href="#" onclick="document.getElementById({{$category->id}}).submit();">Borrar</a>
                          </small>
                          {!! Form::close() !!}
                      </span>
                      </td>
                      <td>{{ $category->description }}</td>
                      <td>{{ $category->slug }}</td>
                  </tbody>
                  @endforeach
              </table><!-- .table -->
              <div class="text-center">{!! $categories->links() !!}</div>
            </div><!-- .table-responsive -->
          </div><!-- .col-md-8 -->
      </div><!-- .row -->
@endsection
