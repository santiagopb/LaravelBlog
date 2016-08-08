@extends('layouts.sales')

@section('title', '| Nuevo post')

@section('stylesheets')
  {!! Html::style('css/select2.min.css') !!}
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea', menubar:false , plugins: "code",
  toolbar: " styleselect | bold italic | alignjustify alignleft aligncenter alignright | bullist numlist | outdent indent | charmap code",


  });</script>
@endsection

@section('content')
      <div class="row">
          <div class="col-md-12">
              <h3>Crear producto</h3>
          </div>
      </div>

      {!! Form::open(array('route' => 'product.store', 'enctype' => 'multipart/form-data')) !!}
        @include('product.partials._product')
      {!! Form::close() !!}
@endsection

@section('scripts')
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    $(document).ready(function() {
      $(".select2").select2();
    });
  </script>

<script src="{{ URL::asset('js/file.js') }}" ></script>
@endsection
