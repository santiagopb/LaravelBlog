@extends('layouts.app')
@section('title', '| ' )
@section('stylesheets')
  {!! Html::style('css/comments.css') !!}
@endsection
@section('content')
  @if(Session::has('cart'))
  <div class="container">
      <div class="row">
        <h1 class="text-center blank shadow">Carro de compras</h1>
          <div class="col-md-6 col-md-offset-3">
              <ul class="list-group">
                  @foreach($products as $product)
                      <li class="list-group-item">
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{ $product['item']['name'] }}</strong>
                            <span class="label label-success">{{ $product['price'] }}</span>
                            <div class="btn btn-group">
                                <button class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Accion <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Reducir 1</a></li>
                                    <li><a href="#">Reducir todo</a></li>
                                </ul>
                            </div>
                      </li>
                  @endforeach
              </ul><!-- .list-group -->
          </div><!-- .col-md-6 col-md-offset-3 -->
      </div><!-- .row -->
      <div class="row">
          <div class="col-md-6 col-md-offset-3">
              <strong>Total: {{ $totalPrice }}</strong>
          </div><!-- .col-md-6 col-md-offset-3 -->
      </div><!-- .row -->
      <hr>
      <div class="row">
          <div class="col-md-6 col-md-offset-3">
              <button type="button" class="btn btn-success">Checkout</button>
          </div><!-- .col-md-6 col-md-offset-3 -->
      </div><!-- .row -->
  @else
      <div class="row">
          <div class="col-md-6 col-md-offset-3">
              <strong>No hay elementos en el carro</strong>
          </div><!-- .col-md-6 col-md-offset-3 -->
      </div><!-- .row -->
  @endif
  </div><!-- .container -->
@endsection
