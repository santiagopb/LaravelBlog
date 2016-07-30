@if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <strong>Ok!</strong> {{ Session::get('message') }}
  </div>
@endif

@if(count($errors) > 0)
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Verifica las entradas.
  </div>
@endif
