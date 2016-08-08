@extends('layouts.sales')
@section('title', '| Todos los Productos')
@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>
                Entradas
                <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Anadir nueva</a>
              </h3>
          </div><!-- .col-md-12 -->
      </div><!-- .row -->

      <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <th></th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Publico</th>
                      <th>Precio</th>
                  </thead>
                  @foreach($products as $product)

                  <tbody>
                      <td><img src="{{ URL::asset('uploads/products/'.$product->image) }}" style="width:62px; height:62px; float:left; border-radius:5%; margin-right:25px;"></td>
                      <td><a href="{{ route('product.edit', $product->id) }}" ><strong>{{ $product->name }}</strong></a>
                      <span class="help-block">
                          {!! Form::open(array('route' => ['product.destroy', $product->id], 'method' => 'DELETE', 'id' => $product->id)) !!}
                          <small>
                            <a href="{{ route('product.edit', $product->id) }}">Editar</a>
                          | <a href="{{ route('product.show', $product->id) }}">Ver</a>
                          | <a class="text-danger" href="#" onclick="document.getElementById({{$product->id}}).submit();">Borrar</a>
                        </small>
                        {!! Form::close() !!}
                      </span>
                      </td>
                      <td>{{ $product->type=='product'? 'Producto' : 'Servicio' }}</td>
                      <td>{{ $product->public==0?'Privado':'Publico' }}</td>
                      <td>{{ $product->price }}</td>
                  </tbody>

                  @endforeach
              </table><!-- .table -->
              <div class="text-center">{!! $products->links() !!}</div>
            </div><!-- .table-responsive -->
          </div><!-- .col-md-10 -->
      </div><!-- .row -->
@endsection
