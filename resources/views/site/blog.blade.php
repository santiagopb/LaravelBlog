@extends('layouts.app')

@section('title', 'Pagina de bienvenida!!!')

@section('content')
@include('site.partials._slide')
<div class="container">

    <div class="row">
        <div class="col-md-7 col-md-offset-1">
          @foreach($posts as $post)
            <div class="post">
                <br>
                <h3><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h3>
                <p>{!! substr($post->body,0,200) !!} {{ strlen($post->body)>200 ? '...' : '' }}</p>
                <br>
            </div>
            <hr>
          @endforeach
        </div><!-- .col-md-8 -->

        <div class="col-md-3 col-md-offset-1">
            <div class="sidebar">
                <h3>Sidebar</h3>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection
