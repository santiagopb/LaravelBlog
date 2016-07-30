@extends('layouts.app')

@section('title', 'Pagina de biemvenida!!!')

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
                <h3><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h3>
                <p>{{ substr($post->body,0,50) }} {{ strlen($post->body) ? '...' : '' }}</p>
                <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-md btn-primary">Leer mas...</a>
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
