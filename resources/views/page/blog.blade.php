@extends('layouts.app')

@section('title', 'Pagina de bienvenida!!!')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Mi primer blog 1.0</h1>
                <p class="lead">Esta es la primera version de blog funcional</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div><!-- .col-md-12 -->
    </row><!-- .row -->

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
