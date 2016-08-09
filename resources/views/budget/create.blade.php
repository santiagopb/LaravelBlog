@extends('layouts.sales')
@section('title', '| Crear presupuesto')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Nuevo presupuesto
              </h3>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      <div class="row">
          <div class="col-md-12">
              <hr>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      {!! Form::open(array('route' => 'client.store', 'enctype' => 'multipart/form-data')) !!}
      <div class="row">
          <div class="col-md-6">

                <span class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                {{ Form::label('Cliente') }}
                {{ Form::select('user_id', $users->lists('name', 'id'), null, ['class' => 'form-control']) }}
                @if ($errors->has('user_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                @endif
                </span>

                <br>

                {{ Form::text('email', null, array('hidden' => 'true')) }}

          </div><!-- .col-md-6 -->



          <div class="col-md-3 col-md-offset-3">

              <span class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
              {{ Form::label('Fecha') }}
              {{ Form::date('date', \Carbon\Carbon::now(),  ['class' => 'form-control']) }}
              @if ($errors->has('date'))
                  <span class="help-block">
                      <strong>{{ $errors->first('date') }}</strong>
                  </span>
              @endif
              </span>

          </div><!-- .col-md-3 -->
      </div><!-- .row -->

      <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Detalles</strong></div>
            <div class="panel-body">
                <table class="table"  id="customFields">
                    <thead>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>x</th>
                    </thead>
                    <tbody>
                        <td>
                            {{ Form::select('product_id', $products->lists('name', 'id'), null, ['class' => 'form-control']) }}
                        </td>
                        <td>
                            {{ Form::text('title', null, array('class' => 'form-control') )}}
                        </td>
                        <td>
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                        </td>
                        <td>
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="btn btn-sm btn-success addCF">+</a>
                        </td>
                    </tbody>
                </table>
            </div><!-- .panel-body -->
        </div><!-- .panel panel-default -->
      </div><!-- .row -->
      {{ Form::submit('Anadir nuevo usuario', ['class' => 'btn btn-sm btn-primary'])}}
      {!! Form::close() !!}
@endsection

@section('scripts')
  <script>
  $(document).ready(function(){
    $(".addCF").click(function(){
        $("#customFields").append('<tbody><td>{{ Form::select('product_id', $products->lists('name', 'id'), null, ['class' => 'form-control']) }}</td><td>{{Form::text('title', null, array('class' => 'form-control'))}}</td><td>{{Form::text('title', null, array('class' => 'form-control'))}}</td><td>{{Form::text('title', null, array('class' => 'form-control'))}}</td><td><a href="javascript:void(0);" class="btn btn-sm btn-danger remCF">-</a></td></tbody>');
    });
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
  });
  </script>

@endsection
