@extends('layouts.app')
@section('title', '| ' . $post->title)
@section('stylesheets')
  {!! Html::style('css/comments.css') !!}
@endsection
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h1>{{ $post->title }}</h1>
              <span class="help-block">
                  <strong>Url: {{ $post->slug }}</strong>
              </span>
              <p class="lead">{{ $post->body }}</p>

              @include('comment.partials._show')
              @include('comment.partials._form')

              </span>
          </div><!-- .col-md-8 -->
      </div><!-- .row -->
  </div><!-- .container -->
@endsection
