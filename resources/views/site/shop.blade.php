@extends('layouts.app')
@section('title', '| ' )
@section('stylesheets')
  {!! Html::style('css/product-list.css') !!}
@endsection
@section('content')
  <div class="container">
      <h1 class="blank shadow">Productos & servicios</h1>
      <hr>


  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">

              </div>
              <div class="panel-body">
                  <div class="row">
                      @foreach($products as $product)
                      <div class="col-sm-6 col-md-4">

                          <div class="col-item">
                              <div class="photo">
                                  @if($product->image)
                                      <img src="{{ URL::asset('uploads/products/'.$product->image) }}" height="260" width="350" class="img-responsive" alt="{{$product->name}}" />
                                  @else
                                      <img src="http://placehold.it/350x260" class="img-responsive" alt="{{$product->name}}" />
                                  @endif
                              </div>
                              <div class="info">
                                  <div class="row">
                                      <div class="price col-md-6">
                                          <h5>{{$product->name}}</h5>
                                          <h5 class="price-text-color">${{$product->price}}</h5>
                                      </div>
                                      <div class="rating hidden-sm col-md-6">
                                      </div>
                                  </div>
                                  <div class="separator clear-left">
                                      <p class="btn-add">
                                          <i class="fa fa-shopping-cart"></i>
                                          <a href="{{ route('addtocart',  $product->id) }}" class="hidden-sm">Agregar al carro</a>
                                      </p>
                                      <p class="btn-details">
                                          <i class="fa fa-list"></i>
                                          <a href="#" class="hidden-sm">Mas detalles</a>
                                      </p>
                                  </div>
                                  <div class="clearfix">
                                  </div>
                              </div>
                          </div>


                      </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>

  </div>
@endsection
