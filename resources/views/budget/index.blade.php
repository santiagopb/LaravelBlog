@extends('layouts.sales')
@section('title', '| Presupuestos')
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
                      <th>x</th>

                  </thead>
                  @foreach($budgets as $budget)
                  @if(true)
                  <tbody>
                      <td>{{$budget->id}}</td>
                      <td>{{ $budget->client_id}}</td>
                      <td>{{ $budget->date }}</td>
                      <td>{{ $budget->note }}</td>
                  </tbody>
                  @endif
                  @endforeach
              </table><!-- .table -->
              <div class="text-center">{!! $budgets->links() !!}</div>
            </div><!-- .table-responsive -->
          </div><!-- .col-md-8 -->
      </div><!-- .row -->
@endsection
