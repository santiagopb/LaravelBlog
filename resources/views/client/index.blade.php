@extends('layouts.sales')
@section('title', '| Todas las categorias')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Usuarios
              </h3><br>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      <div class="row">

          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <th>Avatar</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      @foreach($roles as $rol)
                        <th>{{ $rol->name }}</th>
                      @endforeach
                  </thead>
                  @foreach($users as $user)
                  @if($user->hasRole('Cliente'))
                  <tbody>
                      <td><img src="{{ URL::asset('uploads/avatars/'.$user->avatar) }}" style="width:62px; height:62px; float:left; border-radius:50%; margin-right:25px;"></td>
                      <td><a href="{{ route('category.edit', $user->id) }}" ><strong>{{ $user->name }}</strong></a>
                      <span class="help-block">
                          {!! Form::open(array('route' => ['client.destroy', $user->id], 'method' => 'DELETE', 'id' => $user->id)) !!}
                          <small>
                            <a href="{{ route('client.edit', $user->id) }}">Editar</a>
                          | <a class="text-danger" href="#" onclick="document.getElementById({{$user->id}}).submit();">Borrar</a>
                          </small>
                          {!! Form::close() !!}
                      </span>
                      </td>
                      <td>{{ $user->email }}</td>
                      @foreach($roles as $rol)
                        <td class="text-center"><input type="checkbox" disabled {{ $user->hasRole($rol->name) ? 'checked' : '' }}></td>
                      @endforeach
                  </tbody>
                  @endif
                  @endforeach
              </table><!-- .table -->
              <div class="text-center">{!! $users->links() !!}</div>
            </div><!-- .table-responsive -->
          </div><!-- .col-md-8 -->
      </div><!-- .row -->
@endsection
